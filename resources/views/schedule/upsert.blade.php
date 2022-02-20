<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form" action="{{ route('schedule.upsert') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <select class="w-100 form-control" name="day">
                                <option value="saturday"
                                @isset($schedule) 
                                    @if($schedule->day == 'saturday' )
                                        selected
                                    @endif
                                @endisset>Saturday</option>
                                <option value="sunday"
                                @isset($schedule) 
                                    @if($schedule->day == 'sunday' )
                                        selected
                                    @endif
                                @endisset
                                >Sunday</option>
                                <option value="monday"
                                @isset($schedule) 
                                    @if($schedule->day == 'monday' )
                                        selected
                                    @endif
                                @endisset
                                >Monday</option>
                                <option value="tuesday"
                                @isset($schedule) 
                                    @if($schedule->day == 'tuesday' )
                                        selected
                                    @endif
                                @endisset
                                >Tuesday</option>
                                <option value="wednesday"
                                @isset($schedule) 
                                    @if($schedule->day == 'wednesday' )
                                        selected
                                    @endif
                                @endisset
                                >Wednesday</option>
                                <option value="thursday"
                                @isset($schedule) 
                                    @if($schedule->day == 'thursday' )
                                        selected
                                    @endif
                                @endisset
                                >Thursday</option>
                                <option value="friday"
                                @isset($schedule) 
                                    @if($schedule->day == 'friday' )
                                        selected
                                    @endif
                                @endisset
                                >Friday</option>
                            </select>
                            @error('day')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="time" placeholder="shift start at" name="start_from" class="w-100 form-control mb-2" value="@isset($schedule){{$schedule->start_from}}@endisset">
                                    @error('start_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="time" placeholder="shift end at" name="end_at" class="w-100 form-control mb-2" value="@isset($schedule){{$schedule->end_at}}@endisset">
                                    @error('end_at')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" class="w-100 form-control mb-2" value="@isset($schedule){{$schedule->id}}@endisset">
                        
                        <button class="btn btn-click mb-3">
                            <a>Submit</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
