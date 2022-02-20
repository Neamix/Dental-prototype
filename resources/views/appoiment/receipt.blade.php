<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   @foreach($appoiment->receipts as $receipt)
                        <Div class="receipt border-bottom mb-3 mt-3 pt-3 pb-3">
                            @if($receipt->type == 'examination')
                                <p><strong>Type</strong> {{ $receipt->type }} </p>
                                <p><strong>Fees</strong> {{ $receipt->fees }} </p>
                                <p><strong>Examination Time</strong> {{ $appoiment->date }} </p>
                            @elseif($receipt->type == 'service')
                                <p><strong>Type</strong> {{ $receipt->type }} </p>
                                @foreach($receipt->services as $service)
                                <p><strong>Service</strong> {{ $service->name }}</p>
                                @endforeach
                                <p><strong>Fees</strong> {{ $receipt->fees }} </p>
                            @endif
                       </Div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>