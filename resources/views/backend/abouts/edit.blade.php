@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>Edit About</h2>
    <form action="{{ route('backend.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control mb-3" id="name" name="name" value="{{ $about->name }}" required>
        </div>
        <div class="col-12 mb-3">
            <textarea name="brief" class="form-control"  id="exampleFormControlTextarea1" rows="3" required>{{ $about->brief }}</textarea>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="designation" class="form-control" value="{{ $about->designation }}" aria-label="Designation" required>
        </div>
        <div class="col-12 mb-3">
            <label for="web_design_percent">Web Design Percentage</label>
            <input type="number" id="web_design_percent" name="web_design_percent" class="form-control" value="{{ $about->web_design_percent }}" min="0" max="100" required>
        </div>
        <div class="col-12 mb-3">
            <label for="development_percent">Development Percentage</label>
            <input type="number" id="development_percent" name="development_percent" class="form-control" value="{{ $about->development_percent }}" min="0" max="100" required>
        </div>

        <div class="col-12 mb-3">
            <label for="facebook_url">Facebook URL</label>
            <input type="text" id="facebook_url" name="facebook" class="form-control" value="{{ $about->facebook }}" required>
        </div>
        <div class="col-12 mb-3">
            <label for="linkedin">Linkedin URL</label>
            <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{ $about->linkedin }}" required>
        </div>

        <div class="col-12 mb-3">
            <label for="github">Github URL</label>
            <input type="text" id="github" name="github" class="form-control" value="{{ $about->github }}" required>
        </div>


        <div class="col-12 mb-3">
            <label for="branding_percent">Branding Percentage</label>
            <input type="number" id="branding_percent" name="branding_percent" class="form-control" value="{{ $about->branding_percent }}" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="col-6">
            <img src="{{ asset('storage/' . $about->image) }}" alt="about Image" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
