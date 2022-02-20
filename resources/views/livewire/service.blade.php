<div>
    <form class="form">
        <select>
            @foreach($services as $service)
                <option value="{{$service->id}}">{{ $service->name }}</option>
            @endforeach
        </select>
    </form>
</div>
