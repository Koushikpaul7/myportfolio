@extends('backend.layouts.admin') 

@section('content')
<form method="POST" enctype="multipart/form-data" action="{{ route('backend.portfolios.store') }}" class="form-group">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" required class="form-control">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" class="form-control"></textarea>
    <label for="category">Category</label>
    <select name="category" class="form-control">
        <option value="web_design">Web Design</option>
        <option value="web_development">Web Development</option>
    </select>

    <label for="url">URL</label>
    <input type="url" name="url" value="{{ old('url', $portfolio->url ?? '') }}" placeholder="Portfolio URL" class="form-control">

    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection