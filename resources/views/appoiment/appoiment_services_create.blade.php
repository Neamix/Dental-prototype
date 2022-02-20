<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Service To Appoiment') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form" action="{{ route('appoiment.service.add',['appoiment'=>$appoiment->id]) }}" method="post">
                        @csrf
                        <label class="mb-2"><strong>Add service</strong></label>
                        <input type="hidden" value="Examination" name="name">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="service" class="form-control">
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}"> {{ $service->name }} </option>
                                    @endforeach
                                    @error('service')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" placeholder="Number"  name="number">
                                @error('number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button class="btn-click">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
