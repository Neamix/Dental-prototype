<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppoimentRequest;
use App\Http\Requests\AppoimentServiceRequest;
use App\Models\Appoiment;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class AppoimentsController extends Controller
{
    public function index() 
    {
        return view('appoiment.index',[
            'appoiments' => Appoiment::all(),
        ]);
    }

    public function upsertInstance(AppoimentRequest $request)
    {
        Appoiment::upsertInstance($request);
        return redirect()->route('appoiment');
    }

    public function delete(Appoiment $appoiment)
    {
        $appoiment->deleteInstance();
        return redirect()->route('schedule');
    }

    public function create(Patient $patient)
    {
        return view('appoiment.upsert',['patient' => $patient]);
    }

    public function edit(Appoiment $appoiment,Patient $patient)
    {
        return view('appoiment.upsert',[
            'appoiment' => $appoiment,
            'patient'   => $patient
        ]);
    }

    public function addService(Request $request,Appoiment $appoiment)
    {
        $appoiment->addService($request->service_id,$request->number);
        return redirect()->route('appoiment.service');
    }

    public function appoimentServices(Appoiment $appoiment)
    {
        return view('appoiment.services',[
            'appoiment' => $appoiment
        ]);
    }

    public function appoimentServicesCreate(Appoiment $appoiment)
    {
        return view('appoiment.appoiment_services_create',[
            'appoiment' => $appoiment,
            'services'  => $appoiment->getAllowedServices()->get()
        ]);
    }

    public function appoimentServicesAdd(AppoimentServiceRequest $request,Appoiment $appoiment)
    {
        $appoiment->addService($request->service,$request->number);
        return redirect()->route('appoiment.service',['appoiment' => $appoiment->id]);
    }

    public function appoimentServicesDelete(Appoiment $appoiment,Service $service)
    {
        $appoiment->removeService($service->id);
        return redirect()->route('appoiment.service',['appoiment' => $appoiment->id]);
    }

    public function appoimentBill(Appoiment $appoiment)
    {
        return view('appoiment.appoiment_bill',[
            'appoiment' => $appoiment
        ]);
    }

    public function assessment(Appoiment $appoiment)
    {
        return view('appoiment.assessment',[
            'appoiment' => $appoiment
        ]);
    }

    public function payExaminationFees(Appoiment $appoiment)
    {
        $appoiment->payExaminationFees();

        return  redirect()->route('appoiment');
    }

    public function appoimentReceipt(Appoiment $appoiment) {
        return view('appoiment.receipt',[
            'appoiment' => $appoiment
        ]);
    }

    public function payServicesFees(Appoiment $appoiment)
    {
        $appoiment->payServicesFees();
        return redirect()->back();
    }
}
