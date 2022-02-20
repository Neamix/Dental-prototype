<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($patient)
            {{ __('Edit Patient') }}
            @else
            {{ __('Create Patient') }}
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form" action="{{ route('patient.upsert') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input name="name" type="text" placeholder="Enter Patient name" class="w-100 form-control mb-2" value="@isset($patient){{$patient->name}}@endisset">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" placeholder="Enter Email" name="email" class="w-100 form-control mb-2" value="@isset($patient){{$patient->email}}@endisset">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="number" placeholder="Enter Phone" name="phone" class="w-100 form-control mb-2" value="@isset($patient){{$patient->phone}}@endisset">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="number" placeholder="Enter Age" name="age" class="w-100 form-control mb-2" value="@isset($patient){{$patient->age}}@endisset">
                                    @error('age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" class="w-100 form-control mb-2" value="@isset($patient){{$patient->id}}@endisset">
                        
                        <button class="btn btn-click mb-3">
                            <a>Submit</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
