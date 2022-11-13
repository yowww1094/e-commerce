@extends('layouts.admin')

@section('content')
    
    <div>

        @include('livewire.admin.brand.modal-form')
        

        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Brands
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addbrandModal" class="btn btn-primary text-white btn-sm float-end">Add Brand</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->status == 1 ? 'Hidden':'Visible' }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="4" class="text-center"><h4>No Brands Available!!</h4></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2 d-flex justify-content-center">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('Script')
        
        <script>
            window.addEventListener('close-modal', event => {
                $('#addbrandModal').modal('hide');
            })
        </script>

    @endpush

@endsection