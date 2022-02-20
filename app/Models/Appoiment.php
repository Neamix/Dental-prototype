<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appoiment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['diagnoses'];

    static function upsertInstance ($data) 
    {
        $appoiment = self::updateOrCreate(
            ['id' => $data->id],
            [
                'patient_id' =>$data->patient_id,
                'date' => $data->date,
            ]
        );

        return $appoiment;
    }

    public function getAppoimentDateAttribute()
    {
        return Carbon::parse($this->date)->format('Y-m-d\TH:i');
    }

    public function deleteInstance()
    {
        $this->delete();
    }

    public function checkExaminationServiceExist()
    {
        $checkExaminationServiceExist = Service::where('name','examination')->count();

        return $checkExaminationServiceExist;
    }

    public function addService($service_id,$number)
    {
        $this->services()->attach($service_id , ['number' => $number]);
    }

    public function getAllowedServices() 
    {
        $usedServices = $this->services()->pluck('services.id')->toArray();
        return Service::whereNotIn('id',$usedServices);
    }

    public function removeService($service_id)
    {
        $this->services()->detach([$service_id]);
    }

    public function getServicesUnpaidFeesAttribute() 
    {
        $servicesFee = 0;
        $unpaidServices =  DB::table('appoiment_service')->where(['fees' => 'unpaid','appoiment_id' => $this->id])->get();

        foreach($unpaidServices as $service) {
            $servicesFee += $service->number  *  Service::find($service->service_id)->fees;
        }

        return $servicesFee;
    }

    public function getServicesFeesAttribute()
    {
        $servicesFee = 0;
        
        foreach($this->services as $service) {
            $servicesFee += $service->appoiments[0]->pivot->number  *  $service->fees;
        }

        return $servicesFee;
    }

    public function getTotalAttribute()
    {
        $total = 0;

        $total += app('getSystemVariable',['key' => 'examiantion'])->value;

        foreach($this->services as $service) {
            $total += $service->appoiments[0]->pivot->number  *  $service->fees;
        }

        return $total;
    }

    public function hasRecieptsOfType($type)
    {
        $checkAppoimentReceipt = Receipt::where(['appoiment_id' => $this->id,'type' => $type])->count();

        return $checkAppoimentReceipt;
    }

    public function payExaminationFees()
    {
        if($this->fees == 'unpaid') {

            $this->fees = 'paid';
            $this->save();
    
            Receipt::createInstance('examination', app('getSystemVariable',['key' => 'examination'])->value,$this );

        }
    }

    public function hasUnpaidServices()
    {
        $unpaidServices = DB::table('appoiment_service')->where(['fees' => 'unpaid','appoiment_id' => $this->id])->count();

        return $unpaidServices;
    }

    public function payServicesFees()
    {
        Receipt::createInstance('service',$this->services_unpaid_fees,$this);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('number');
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
