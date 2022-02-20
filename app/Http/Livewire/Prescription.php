<?php

namespace App\Http\Livewire;

use App\Models\Prescription as ModelsPrescription;
use Livewire\Component;

class Prescription extends Component
{
    public $appoiment;
    public $drug;

    protected $rules = [
        'drug' => 'required',
    ];

    public function create()
    {
        $data = $this->validate();
        $data['appoiment'] = $this->appoiment;
        ModelsPrescription::upsertInstance($data);
        $this->drug = '';
    }

    public function delete($prescription)
    {
       $prescription = ModelsPrescription::find($prescription);

       if($prescription) {
            $prescription->deleteInstance();
       }
    }

    public function render()
    {
        $this->appoiment->load('prescriptions');
        return view('livewire.prescription',[
            'appoiment' => $this->appoiment
        ]);
    }
}
