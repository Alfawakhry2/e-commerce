@extends("Admin.layout")

@section('body')

@include('success')
@include('errors')

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Add New Product</h2>
    </div>

    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text-white" name="name" class="form-control text-white" id="name" value="{{ old('name') }}" placeholder="Enter name">
        </div>

        <div class="form-group mb-3">
            <label for="desc">Product Description</label>
            <textarea name="desc" class="form-control text-white" id="desc" rows="3" placeholder="Enter description">{{ old('desc') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Product Price</label>
            <input type="number" name="price" class="form-control text-white" id="price" value="{{ old('price') }}" placeholder="Enter price">
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Product Quantity</label>
            <input type="number" name="quantity" class="form-control text-white" id="quantity" value="{{ old('quantity') }}" placeholder="Enter quantity">
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category Name</label>
            <select name="category_id" class="form-control text-white" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
        </div>
    </form>
</div>
@endsection
