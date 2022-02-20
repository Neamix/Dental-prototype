<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Receipt extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function createInstance($type,$fees,$appoiment)
    {
        $receipt = self::create([
            'type' => $type,
            'fees' => $fees,
            'appoiment_id' => $appoiment->id,
            'due_date' => Carbon::now()
        ]);

        if($type == 'service') {
            DB::table('appoiment_service')->where(['fees' => 'unpaid','appoiment_id' => $appoiment->id])
                                          ->update(['fees' => 'paid','receipt_id' => $receipt->id]);
        }
    }

    public function getServicesAttribute() 
    {
        return DB::table('appoiment_service')->join('services','service_id','services.id')->where(['receipt_id' => $this->id])
        ->get();
    }
}
