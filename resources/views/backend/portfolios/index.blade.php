@extends('backend.layouts.admin')

@section('content')
<div class="container">
    <h2>All Portfolios</h2>
    <a href="{{ route('backend.portfolios.create') }}" class="btn btn-success mb-3">+ Create Portfolio </a>

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
            @foreach($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->title }}</td>
                <td><img src="{{ asset($portfolio->image) }}" width="100"></td>
                <td>
                    {{-- <a href="{{ route('banners.show', $banner->id) }}" class="btn btn-info btn-sm">View</a> --}}
                    <a href="{{ route('backend.portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a> 
                  <form action="{{ route('backend.portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline-block;">
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