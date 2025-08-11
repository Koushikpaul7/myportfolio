@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Service</h2>
    <form action="{{ route('backend.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control mb-3" id="title" name="title" value="{{ $service->title }}" required>
        </div>
         <div class="col-12 mb-3">
            <input type="text" name="description" class="form-control" value="{{ $service->description }}" aria-label="Sub title" required>
        </div>
       
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="col-6">
            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection