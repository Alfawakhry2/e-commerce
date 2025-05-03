@extends('Admin.layout')

@section('body')
@include('errors')
@include('success')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-dark text-white p-4 rounded shadow-lg">
                <div class="row align-items-start">
                    {{-- Product Image --}}
                    <div class="col-md-5 mb-4 mb-md-0">
                        @if($product->image)
                            <img src="{{ asset("storage/$product->image") }}" alt="Product Image" class="img-fluid rounded border border-secondary">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary rounded" style="height: 300px;">
                                <span class="text-white-50">No Image Available</span>
                            </div>
                        @endif
                    </div>

                    {{-- Product Info --}}
                    <div class="col-md-7">
                        <h2 class="fw-bold mb-3 border-bottom pb-2">{{ $product->name }}</h2>

                        <div class="mb-3">
                            <h5 class="text-muted mb-1">Description:</h5>
                            <p class="mb-0">{{ $product->desc }}</p>
                        </div>

                        <div class="mb-3">
                            <h5 class="text-muted mb-1">Price:</h5>
                            <span class="h5 text-success">${{ $product->price }}</span>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-muted mb-1">Quantity:</h5>
                            <span class="badge bg-info px-3 py-2">{{ $product->quantity }} available</span>
                        </div>

                        <div class="d-flex">
                            <a href="{{ url("product/edit/$product->id") }}" class="btn btn-outline-primary me-3">
                                <i class="mdi mdi-pencil-outline"></i> Update
                            </a>
                            <form action="{{ url("product/delete/$product->id") }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="mdi mdi-delete"></i> Delete
                                </button>
                            </form>
                        </div>

                        <div class="mt-4">
                            <a href="{{ url("products") }}" class="text-decoration-none text-white-50">
                                ← Back to Product List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
