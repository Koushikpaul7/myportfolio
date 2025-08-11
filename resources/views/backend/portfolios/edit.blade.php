@extends('backend.layouts.admin') 

@section('content')

<form method="POST" enctype="multipart/form-data" action="{{ route('backend.portfolios.update', $portfolio->id) }}" class="form-group">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $portfolio->title }}" placeholder="Title" required class="form-control">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" class="form-control">{{ $portfolio->description }}</textarea>
    <label for="category">Category</label>
    <select name="category" class="form-control">
        <option value="web_design" {{ $portfolio->category == 'web_design' ? 'selected' : '' }}>Web Design</option>
        <option value="web_development" {{ $portfolio->category == 'web_development' ? 'selected' : '' }}>Web Development</option>
    </select>

    <label for="url">URL</label>
    <input type="url" name="url" value="{{ $portfolio->url }}" placeholder="Portfolio URL" class="form-control">

    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    <div class="mt-3">
        <img src="{{ asset('storage/' . $portfolio->image) }}" width="100" alt="Portfolio Image">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection


