
@extends('backend.layouts.admin') 

@section('content')
<form action="{{ route('backend.service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <h3 class="text-center mb-5 font-weight-bold ml-2 text-primary ">Create Service</h3>
        <div class="col-12 mb-3">
            <input type="text" name="title" class="form-control" placeholder="Service Name" aria-label="Title" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="description" class="form-control" placeholder="Brief (if any)" aria-label="Brief" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="inputGroupFile01" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endsection
