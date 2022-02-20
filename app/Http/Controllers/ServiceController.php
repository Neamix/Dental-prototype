<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() 
    {
        return view('service.index',['services' => Service::all()]);
    }

    public function upsertInstance(ServiceRequest $request)
    {
        Service::upsertInstance($request);
        return view('service.index',['services' => Service::all()]);
    }

    public function delete(Service $service)
    {
        $service->deleteInstance();
        return redirect()->route('service');
    }

    public function create()
    {
        return view('service.upsert');
    }

    public function edit(Service $service)
    {
        return view('service.upsert',[
            'service' => $service
        ]);
    }
}
