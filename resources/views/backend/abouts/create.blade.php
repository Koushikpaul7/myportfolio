
@extends('backend.layouts.admin') 

@section('content')
<form action="{{ route('backend.abouts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="text-center mb-5 font-weight-bold ml-2 text-primary ">Create About</h3>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" required>
        </div>
        <div class="col-12 mb-3">
        <label for="brief">Brief</label>
            <textarea type="text" name="brief"class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <div class="col-12 mb-3">
            <label for="designation">Designation</label>
            <input type="text" name="designation" class="form-control" aria-label="Designation" required>
        </div>
        <div class="col-12 mb-3">
            <label for="web_design_percent">Web Design Percentage</label>
            <input type="number" id="web_design_percent" name="web_design_percent" class="form-control" min="0" max="100" required>
        </div>
        <div class="col-12 mb-3">
            <label for="development_percent">Development Percentage</label>
            <input type="number" id="development_percent" name="development_percent" class="form-control" min="0" max="100" required>
        </div>
         <div class="col-12 mb-3">
            <label for="facebook">Facebook URL</label>
            <input type="text" id="facebook" name="facebook" class="form-control" required>
        </div>
        <div class="col-12 mb-3">
            <label for="linkedin">Linkedin URL</label>
            <input type="text" id="linkedin" name="linkedin" class="form-control" required>
        </div>
         <div class="col-12 mb-3">
            <label for="github">Github URL</label>
            <input type="text" id="github" name="github" class="form-control" required>
        </div>
          <div class="col-12 mb-3">
            <label for="branding_percent">Branding Percentage</label>
            <input type="number" id="branding_percent" name="branding_percent" class="form-control" min="0" max="100" required>
        </div>
         
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="inputGroupFile01" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endsection
