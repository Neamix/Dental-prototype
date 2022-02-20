<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index',[
            'patients' => Patient::all()
        ]);
    }

    public function upsertInstance(PatientRequest $request)
    {
        Patient::upsertInstance($request);
        return redirect()->route('patient');
    }

    public function delete(Patient $patient)
    {
        $patient->deleteInstance();
        return redirect()->route('patient');
    }

    public function edit(Patient $patient)
    {
        return view('patient.upsert',[
            'patient' => $patient
        ]);
    }

    public function create()
    {
        return view('patient.upsert');
    }

}
