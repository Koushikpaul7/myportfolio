@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>All Admin Users</h2>
    <a href="{{ route('backend.admin.create') }}" class="btn btn-primary mb-3">Add New Admin</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->is_super ? 'Super Admin' : 'Admin' }}</td>
                <td>{{ $admin->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
