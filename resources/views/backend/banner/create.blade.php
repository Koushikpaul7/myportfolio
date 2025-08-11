
@extends('backend.layouts.admin') 

@section('content')
<form action="{{ route('backend.banner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <h3 class="text-center mb-5 font-weight-bold ml-2 text-primary ">Create Banner</h3>
        <div class="col-12 mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="subtitle" class="form-control" placeholder="Sub title" aria-label="Sub title" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgOne" class="form-control" placeholder="Designation One" aria-label="Designation One" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgTwo" class="form-control" placeholder="Designation two" aria-label="Designation two" required>
        </div>
        <div class="col-12 mb-3">
            <input type="text" name="desgThree" class="form-control" placeholder="Designation three" aria-label="Designation three" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="inputGroupFile01" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endsection
