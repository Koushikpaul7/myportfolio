@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>Create New Admin</h2>

    <form action="{{ route('backend.admin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_super" class="form-check-input" id="is_super">
            <label class="form-check-label" for="is_super">Super Admin</label>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
