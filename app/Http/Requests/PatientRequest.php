<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'age'  => ['required','integer'],
            'phone' => ['required'],
            'email' => ['required','email',function($value,$attribute,$fail){

                $args = $this;

                if($this->email) {
                    $patientExist = Patient::where('email',$this->email)->where(function($query) use ($args) {

                        if($args->id) {
                            $query->where('id','<>',$args->id);
                        }

                    })->count();

                    if($patientExist) {
                        return $fail('This email not exist');
                    }
                }

            }]
        ];
    }
}
