<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        return view('system.index',[
            'systems' => System::all()
        ]);
    }

    public function upsertInstance(SystemRequest $request)
    {
        System::upsertInstance($request);
        return redirect()->route('system');
    }

    public function edit(System $system)
    {
        return view('system.upsert',[
            'system' => $system
        ]);
    }

}
