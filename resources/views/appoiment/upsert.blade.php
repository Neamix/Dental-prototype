<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New Appoiment') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(app('getSystemVariable',['key' => 'examination']))
                    <form class="form" action="{{ route('appoiment.upsert') }}" method="post">
                        @csrf
                        
                        <Div class="mb-3">
                            <strong class="">Book appoiment for {{ $patient->name }}</strong>
                        </Div>

                        <div class="form-group mb-4">
                            <input type="datetime-local" placeholder="Appoiment time" class="form-control w-100" name="date" value="@isset($appoiment){{$appoiment->appoiment_date}}@endisset">
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="id" class="w-100 form-control mb-2" value="@isset($appoiment){{$appoiment->id}}@endisset">
                        <input type="hidden" name="patient_id" class="w-100 form-control mb-2" value="{{$patient->id}}">

                        <button class="btn btn-click mb-3">
                            <a>Submit</a>
                        </button>
                    </form>
                    @else
                    <form class="form" action="{{ route('system.upsertInstance') }}" method="post">
                        @csrf
                        <label class="mb-2"><strong>To be able to make appoiment you have to enter examination fees</strong></label>
                        <input type="hidden" value="examination" name="key">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" placeholder="Fees" class="form-control" name="value" required>
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <button class="btn-click">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    </div>
</x-app-layout>
