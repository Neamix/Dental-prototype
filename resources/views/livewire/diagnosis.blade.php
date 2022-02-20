<div>
    <h6 class="mb-3 mt-3"><strong>Diagnosis</strong></h6>
    <form class="mb-3 row" wire:submit.prevent="create">
        <div class="col-md-6">
            <input type="text" wire:model="diagnosis" class="form-control" placeholder="Diagnosis" name="diagnosis">
            @error('diagnosis') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <button class="btn-click">
                Add Diagnosis
            </button>
        </div>
    </form>
    <div class="d-flex">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appoiment->diagnoses as $diagnosis)
                <tr>
                    <td> {{ $diagnosis->diagnosis }} </td>
                    <td class="d-flex"> 
                        <button class="btn btn-danger" wire:click="delete({{ $diagnosis->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
