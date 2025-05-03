@extends('Admin.layout')

@section('body')
@include('success')
@include('errors')

<div class="container mt-5">
    <div class="card shadow-lg bg-dark text-white border-0">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0 ">Category Name : {{ $category->name }}</h3>
            <div>
                <a href="{{ url("editcategory/$category->id") }}" class="btn btn-sm btn-light text-dark me-2">✏️ Edit</a>
                <a href="{{ url('allcategories') }}" class="btn btn-sm btn-light text-dark">↩️ Back</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="text-muted text-info">Small Description:</h6>
                    <p class="text-white-50">{{ $category->small_desc }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">Full Description:</h6>
                    <p class="text-white-50">{{ $category->desc }}</p>
                </div>
            </div>

            <div class="text-center mb-3">
                <h6 class="text-muted">Category Image:</h6>
                @if ($category->image == null)
                    <p class="text-danger">⚠️ No image for this category</p>
                @else
                    <img src="{{ asset("storage/$category->image") }}" class="img-thumbnail bg-secondary border-0 shadow" style="max-width: 350px;" alt="Category Image">
                @endif
            </div>
        </div>

        <div class="card-footer bg-secondary text-end">
            <form action="{{ url("deletecategory/$category->id") }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">🗑️ Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
