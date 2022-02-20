<?php

namespace App\Http\Requests;

use App\Models\Schedule;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class AppoimentRequest extends FormRequest
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
            'date' => ['required','date',function($value,$attribute,$fail){

                $checkWorkingHour = Schedule::isDuringWorkingHours($this->date);

                if(! $checkWorkingHour) {
                    return $fail('this time not during the working hours');
                }

                $now_date = new DateTime();
                $due_date = new DateTime($this->date);

                if($now_date >= $due_date) {
                    return $fail('this date already passed');
                }

            }]
        ];
    }
}
