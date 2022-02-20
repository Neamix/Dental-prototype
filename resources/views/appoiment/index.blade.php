<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Patient name</th>
                                <th>Examination Fees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appoiments as $appoiment)
                            <tr>
                                <td> {{ $appoiment->date }} </td>
                                <td> {{ $appoiment->patient->name }} </td>
                                <td> {{ $appoiment->fees }} </td>
                                <td class="d-flex"> 
                                    <a href="{{ route('appoiment.edit',['appoiment' => $appoiment->id,'patient' => $appoiment->patient->id]) }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <a class="ml-3" href="{{ route('appoiment.examination.fees',['appoiment' => $appoiment->id]) }}">
                                    </a>

                                    <a class="ml-3" href="{{ route('appoiment.assessment',['appoiment' => $appoiment->id]) }}">
                                        <button class="btn btn-primary">View Assessment</button>
                                    </a>

                                    <a class="ml-3" href="{{ route('appoiment.service',['appoiment' => $appoiment->id]) }}">
                                        <button class="btn btn-primary">Services</button>
                                    </a>

                                    <a class="ml-3" href="{{ route('appoiment.receipt',['appoiment' => $appoiment->id]) }}">
                                        <button class="btn btn-primary">Receipt</button>
                                    </a>

                                    <form action="{{ route('appoiment.examination.fees',['appoiment' => $appoiment->id]) }}" method="post" class="ml-3">
                                        @csrf
                                        @if($appoiment->fees == 'unpaid')
                                        <button class="btn btn-primary">Pay Examination</button>
                                        @endif
                                    </form>
            
                                    <form action="{{ route('appoiment.delete',['appoiment' => $appoiment->id]) }}" method="post" class="ml-3">
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