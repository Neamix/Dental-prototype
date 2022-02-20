<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($schedule)
            {{ __('Create Service') }}
            @else
            {{ __('Edit Service') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form" action="{{ route('service.upsert') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Service name" name="name" class="w-100 form-control mb-2" value="@isset($service){{$service->name}}@endisset">
                                    @error('service')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="number" placeholder="Fees" name="fees" class="w-100 form-control mb-2"  value="@isset($service){{$service->fees}}@endisset">
                                    @error('fees')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" class="w-100 form-control mb-2" value="@isset($service){{$service->id}}@endisset">
                        
                        <button class="btn btn-click mb-3">
                            <a>Submit</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
