@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>About List</h2>
    <a href="{{ route('backend.abouts.create') }}" class="btn btn-success mb-3">+ Create about</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $about->name }}</td>
                <td><img src="{{ asset($about->image) }}" width="100"></td>
                <td>
                    {{-- <a href="{{ route('banners.show', $banner->id) }}" class="btn btn-info btn-sm">View</a> --}}
                    <a href="{{ route('backend.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a> 
                  <form action="{{ route('backend.abouts.destroy', $about->id) }}" method="POST" style="display:inline-block;">
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
