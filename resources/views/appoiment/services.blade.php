<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appoiment Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex">
                <a href="{{ route('appoiment.service.create',['appoiment' => $appoiment->id])  }}">
                    <button class="btn-click mb-3">
                        Add Services
                    </button>
                </a>
                @if($appoiment->hasUnpaidServices())
                <form action="{{ route('appoiment.services.fees',['appoiment' => $appoiment->id]) }}" method="post" class="ml-3">
                    @csrf
                    <button class="btn-click mb-3">
                        Pay Services Fees
                    </button>
                </form>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Service</th>
                                <th>Fees</th>
                                <th>Number</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appoiment->services as $service)
                            <tr>
                                <td> {{ $service->name }} </td>
                                <td> {{ $service->fees }} </td>
                                <td> {{ $service->appoiments[0]->pivot->number }} </td>
                                <td> {{ $service->appoiments[0]->pivot->fees }} </td>
                                <td class="d-flex"> 
                                    <form action="{{ route('appoiment.service.delete',['appoiment' => $appoiment->id,'service' => $service->id]) }}" method="post" class="ml-3">
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>