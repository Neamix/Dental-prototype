<?php

namespace App\Http\Livewire;

use App\Models\Diagnosis as ModelsDiagnosis;
use Livewire\Component;

class Diagnosis extends Component
{
    public $appoiment;
    public $diagnosis;

    protected $rules = [
        'diagnosis' => 'required',
    ];

    public function create()
    {
        $data = $this->validate();
        $data['appoiment'] = $this->appoiment;
        ModelsDiagnosis::upsertInstance($data);
        $this->diagnosis = '';
    }

    public function delete($diagnosis)
    {
       $diagnosis = ModelsDiagnosis::find($diagnosis);

       if($diagnosis) {
            $diagnosis->deleteInstance();
       }
    }

    public function render()
    {
        $this->appoiment->load('diagnoses');
        return view('livewire.diagnosis',[
            'appoiment' => $this->appoiment
        ]);
    }
}
