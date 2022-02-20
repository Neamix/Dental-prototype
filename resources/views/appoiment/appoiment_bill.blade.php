<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="patient_details">
                       <h5> <strong>{{ $appoiment->patient->name }}</strong> </h5>
                   </div>
                   <Div class="service_details">
                       <div class="row">
                            <div class="col-md-4">
                               <strong>Examination fees</strong>
                            </div>
                            <div class="col-md-4">
                            {{ app('getSystemVariable',['key' => 'examiantion'])->value }}
                            </div>
                       </div>
                       <div class="row">
                          @foreach($appoiment->services as $service)
                            <div class="col-md-4">
                              <strong>{{ $service->name }}</strong>
                            </div>
                            <div class="col-md-4">
                                {{ $service->appoiments[0]->pivot->number }} X {{ $service->fees }}
                                =
                                {{ $service->appoiments[0]->pivot->number * $service->fees }}
                            </div>
                          @endforeach
                       </div>

                       <p class="mt-5">
                            Total: {{ $appoiment->total }}
                       </p>
                   </Div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>