@extends('Admin.layout')

@section('body')
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <a class="card-title text-decoration-none" href="{{ url('allcategories') }}"><h5>Total Categories</h5></a>
                <a class="card-title text-decoration-none" href="{{ url('allcategories') }}"><p class="card-text display-6">{{$c_count}}</p></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3 ">
            <div class="card-body">
                <a class="card-title text-decoration-none" href="{{ url('products') }}"><h5>Total Products</h5></a>
                <a class="card-title text-decoration-none" href="{{ url('products') }}"><p class="card-text display-6">{{$p_count}}</p></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <a class="card-title text-decoration-none" href="{{ url('allcategories') }}"><h5>Total Users</h5></a>
                <a class="card-title text-decoration-none" href="{{ url('allcategories') }}"><p class="card-text display-6">{{$u_count}}</p></a>
            </div>
        </div>
    </div>

</div>
<h4 class="mt-4">Latest Products</h4>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($latestProducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-5 d-flex justify-content-center gap-4">
    <a href="{{url('products/create') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow">➕ Add Product</a>
    <a href="{{ url('addcategory') }}" class="btn btn-info btn-lg px-5 py-3 fw-bold shadow">📁 Add Category</a>
</div>

@endsection
