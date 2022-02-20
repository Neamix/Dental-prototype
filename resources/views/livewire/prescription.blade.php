<div>
<h6 class="mb-3 mt-3"><strong>Prescription</strong></h6>
<form class="mb-3 row" wire:submit.prevent="create">
    <div class="col-md-6">
            <input type="text" wire:model="drug" class="form-control" placeholder="Prescription">
            @error('prescription') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <button class="btn-click">
                Add prescription
            </button>
        </div>
    </form>
    <div class="d-flex">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Test</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appoiment->prescriptions as $prescription)
                <tr>
                    <td> {{ $prescription->drug }} </td>
                    <td class="d-flex"> 
                        <button class="btn btn-danger" wire:click="delete({{ $prescription->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
