

<div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="submitBrand">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Brand Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Brand Slug</label>
                            <input type="text" wire:model="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Brand Status</label><br>
                            <small class="text-muted">Checked: Hidden, UnChecked: Visible</small><br>
                            <input type="checkbox" wire:model="status" style="width: 30px; height: 30px">
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    
                </div>

            </form>
        </div>
    </div>
</div>