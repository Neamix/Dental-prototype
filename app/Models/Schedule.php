<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    static function upsertInstance($data)
    {
        $upsertSchedule = self::updateOrCreate(
        ['id' => $data->id],
        [
            'day'  => $data->day,
            'start_from' => $data->start_from,
            'day_order_in_the_week' => self::getDayOrder($data->day),
            'end_at'   => $data->end_at
        ]);

        return $upsertSchedule;
    }

    public function deleteInstance()
    {
        $this->delete();
    }

    static function getDayOrder($day)
    {
        $days = ['saturday','sunday','monday','tuesday','wednesday','thursday','friday'];
        return array_search($day,$days) + 1;
    }

    public function isDuringWorkingHours($date)
    {
        $date = strtotime($date);
        $day  = strtolower(date('l'));
        $time = date('H:i:s', $date);

        $checkWorkingHour = Schedule::where([
            'day' => $day
        ])->where('start_from','<',$time)->where('end_at','>',$time)->count();

        return $checkWorkingHour;
    }

    public  function getWorkingIntervalAttribute()
    {
        return $this->start_from .' - '.$this->end_at;
    }

    static function getSchedule()
    {
        return self::orderBy('day_order_in_the_week')->get();
    } 


}
