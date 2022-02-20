<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemRequest extends FormRequest
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
            'key'   => ['required'],
            'value' => ['required',function($value,$attribute,$fail){
                if($this->key == 'examination')
                {
                    $this->validate([
                        'value' => 'integer'
                    ]);
                }

            }],

        ];
    }
}
