<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <form method="GET" action="{{ route('categories.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
            </div>
            <div class="col-md-4">
                <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('images/resource/' . $category->image) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px;"> <!-- Display category image -->
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default" style="width: 50px; height: 50px;"> <!-- Default image -->
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>&dollar; {{ number_format($category->price, 2) }}</td>
                    <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $categories->links() }} <!-- This generates the pagination links -->
    </div>
</div>
@endsection
