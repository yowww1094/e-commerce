@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="mt-2 border-2" style="height: 100px; width: 100px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }} style="width: 30px; height: 30px">
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <hr>
                        <div class="col-md-12 mb-3">
                            <h4>SEO Tags</h4>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label>Meta Name</label>
                            <input type="text" value="{{ $category->description }}" name="meta_name" class="form-control">
                            @error('meta_name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Slug</label>
                            <input type="text" value="{{ $category->meta_slug }}" name="meta_slug" class="form-control">
                            @error('meta_slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end text-white">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection