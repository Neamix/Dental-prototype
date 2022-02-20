<?php

namespace App\Http\Livewire;

use App\Models\Test as ModelsTest;
use Livewire\Component;

class Test extends Component
{
    public $appoiment;
    public $test;

    protected $rules = [
        'test' => 'required',
    ];

    public function create()
    {
        $data = $this->validate();
        $data['appoiment'] = $this->appoiment;
        ModelsTest::upsertInstance($data);
        $this->test = '';
    }

    public function delete($diagnosis)
    {
       $diagnosis = ModelsTest::find($diagnosis);

       if($diagnosis) {
            $diagnosis->deleteInstance();
       }
    }

    public function render()
    {
        $this->appoiment->load('tests');
        return view('livewire.test',[
            'appoiment' => $this->appoiment
        ]);
    }
}
