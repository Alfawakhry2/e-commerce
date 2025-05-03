@extends('User.layout')

@section('title', 'Home Page')

@section('banner')

<div class="banner header-text">
    <div class="container my-5">
        <h3 class="text-center mb-4">Available Category</h3>
        <div class="owl-carousel category-carousel owl-theme">
            @foreach ($categories as $category)
                <div class="item text-center">
                    <div class="card shadow-sm border-0">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="height: 150px; object-fit: cover;" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ url("categoryproducts/$category->id") }}" class="btn btn-sm btn-dark">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('body')
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="{{ url("") }}">view all products <i class="fa fa-angle-right"></i></a>
                        <form class="" action="{{ url("search")}}" method="GET">
                            <input type="hidden" name="from" value="home">
                            <input class="form-control" type="search" name="key" id="" value="{{ old('key')}}" placeholder="Search For All Products">
                            <button type="submit" class="btn btn-dark mt-2">Search</button>
                        </form>
                    </div>
                </div>

                @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <a href="{{ url("show/product/$product->id") }}">
                            <img src="{{ asset("storage/$product->image") }}" class="card-img-top" style="height: 250px; object-fit:contain;" alt="{{ $product->name }}">
                        </a>
                        <div class="card-body py-3 px-4 d-flex flex-column justify-content-between">
                            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
                            <h6 class="text-primary mb-2">${{ $product->price }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($product->desc, 60) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="text-warning small">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </span>
                                <a href="{{ url("show/product/$product->id") }}" class="btn btn-outline-dark btn-sm">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <h3>No products to display</h3>
                    </div>
                    <br>
                </div>
            @endforelse

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection
