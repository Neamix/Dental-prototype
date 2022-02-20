<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Models\Appoiment;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(Appoiment $appoiment) 
    {
        return view('assessment.index',[
            'assessment' => $appoiment->assessment
        ]);
    }

    public function upsertInstance(AssessmentRequest $request)
    {
        Assessment::upsertInstance($request);
        return redirect()->back();
    }

    public function delete(Assessment $assessment)
    {
        $assessment->deleteInstance();
        return redirect()->route('assessment');
    }

    public function create(Appoiment $appoiment)
    {
        return view('assessment.upsert',[
            'appoiment' => $appoiment
        ]);
    }

    public function edit(Assessment $assessment)
    {
        return view('assessment.upsert',[
            'assessment' => $assessment
        ]);
    }
}
