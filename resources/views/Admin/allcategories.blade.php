@extends('Admin.layout')

@section('body')
@include('success')

<div class="container mt-5">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white h-100 shadow-sm border-0">
                @if ($category->image)
                    <img src="{{ asset("storage/$category->image") }}" class="card-img-top img-fluid" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary" style="height: 200px;">
                        <span class="text-white-50">No image available</span>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text text-white-50 mb-1"><strong>Short:</strong> {{ $category->small_desc }}</p>
                    <p class="card-text text-white-50 flex-grow-1"><strong>Desc:</strong> {{ Str::limit($category->desc, 100) }}</p>
                    <a href="{{ url("showcategory/$category->id") }}" class="btn btn-outline-light mt-3">View Details</a>
                    <a href="{{ url("categoryproducts/$category->id") }}" class="btn btn-outline-light mt-3">Show Category Products</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links() }}
    </div>
</div>


@endsection
