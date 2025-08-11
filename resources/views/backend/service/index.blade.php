@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>All Banners</h2>
    <a href="{{ route('backend.service.create') }}" class="btn btn-success mb-3">+ Create Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td><img src="{{ asset($service->image) }}" width="100"></td>
                <td>
                    {{-- <a href="{{ route('banners.show', $banner->id) }}" class="btn btn-info btn-sm">View</a> --}}
                    <a href="{{ route('backend.service.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a> 
                  <form action="{{ route('backend.service.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
