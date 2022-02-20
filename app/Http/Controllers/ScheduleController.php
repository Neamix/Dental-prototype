<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() 
    {
        return view('schedule.index',['days' => Schedule::getSchedule()]);
    }

    public function upsertInstance(ScheduleRequest $request)
    {
        Schedule::upsertInstance($request);
        return redirect()->route('schedule');
    }

    public function delete(Schedule $schedule)
    {
        $schedule->deleteInstance();
        return redirect()->route('schedule');
    }

    public function create()
    {
        return view('schedule.upsert');
    }

    public function edit(Schedule $schedule)
    {
        return view('schedule.upsert',[
            'schedule' => $schedule
        ]);
    }
}
