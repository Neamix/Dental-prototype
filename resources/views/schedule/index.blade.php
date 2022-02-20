<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="btn btn-click mb-3">
                <a href="{{ route('schedule.create') }}">Create new day</a>
            </button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Day</th>
                                <th>Working Hours</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($days as $day)
                            <tr>
                                <td> {{ $day->day }} </td>
                                <td> {{ $day->working_interval }} </td>
                                <td class="d-flex"> 
                                    <a href="{{ route('schedule.edit',['schedule' => $day->id]) }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <form action="{{ route('schedule.delete',['schedule' => $day->id]) }}" method="post" class="ml-3">
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