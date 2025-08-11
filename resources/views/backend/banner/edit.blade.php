@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Banner</h2>
    <form action="{{ route('backend.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control mb-3" id="title" name="title" value="{{ $banner->title }}" required>
        </div>
         <div class="col-12 mb-3">
            <input type="text" name="subtitle" class="form-control" value="{{ $banner->subtitle }}" aria-label="Sub title" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgOne" class="form-control" value="{{ $banner->desgOne }}" aria-label="Designation One" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgTwo" class="form-control" value="{{ $banner->desgTwo }}" aria-label="Designation two" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgThree" class="form-control" value="{{ $banner->desgThree }}" aria-label="Designation three" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="col-6">
            <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection