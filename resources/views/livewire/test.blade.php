<div>
    <h6 class="mb-3 mt-3"><strong>Tests Table</strong></h6>
    <form class="mb-3 row" wire:submit.prevent="create">
        <div class="col-md-6">
            <input type="text" wire:model="test" class="form-control" placeholder="Test" name="test">
            @error('test') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <button class="btn-click">
                Add Test
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
                @foreach($appoiment->tests as $test)
                <tr>
                    <td> {{ $test->test }} </td>
                    <td class="d-flex"> 
                        <button class="btn btn-danger" wire:click="delete({{ $test->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
