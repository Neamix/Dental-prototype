<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit System') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form" action="{{ route('system.update') }}" method="post">
                        @csrf
                        
                        <Div class="mb-3">
                            <strong class="">Edit {{ $system->key }}</strong>
                        </Div>

                        <div class="form-group mb-4">
                            <input type="hidden" name="key" value="{{$system->key}}">
                            <input type="value" placeholder="Appoiment time" class="form-control w-100" name="value" value="{{$system->value}}">
                            @error('value')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="id" class="w-100 form-control mb-2" value="{{$system->id}}">

                        <button class="btn btn-click mb-3">
                            <a>Submit</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
