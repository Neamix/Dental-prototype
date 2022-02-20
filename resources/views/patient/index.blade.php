<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="btn btn-click mb-3">
                <a href="{{ route('patient.create') }}">Add new Patient</a>
            </button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->age }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('patient.edit',['patient' => $patient->id]) }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <form action="{{ route('patient.delete',['patient' => $patient->id]) }}" method="post" class="ml-3 mr-3">
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                    <a href="{{ route('appoiment.create',['patient' => $patient->id]) }}" class="ml-3">
                                        <button class="btn btn-primary">Patient Appoiments</button>
                                    </a>
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