<?php

namespace App\Http\Requests;

use App\Models\Schedule;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'day' => ['required',function($value,$attribute,$fail){
                
                $args = $this;

                $hasSchedule = Schedule::where('day',$args->day)->where(function($query) use ($args) {
                    if($args->id) {
                        $query->where('id','<>',$args->id);
                    }
                })->count();

                if($hasSchedule) {
                    return $fail($this->day . ' already has schedule');
                }

            }],
            'start_from' => ['required'],
            'end_at' => ['required',function($value,$attribute,$fail){

                if($this->start_from > $this->end_at)
                {
                    return $fail('You must add end at after start from');
                }
            }]
        ];
    }
}
