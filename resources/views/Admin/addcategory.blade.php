@extends("Admin.layout")
@section('body')
@include('errors')

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Add New Category</h2>
    </div>
    <form method="POST" action="{{ route('storecategory') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Category Name">
        </div>

        <div class="form-group mb-3">
            <label for="small_desc" class="form-label">Category Simple Description</label>
            <textarea name="small_desc" class="form-control" id="small_desc" placeholder="Enter Simple Description">{{ old('small_desc') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="desc" class="form-label">Category Full Description</label>
            <textarea name="desc" class="form-control" id="desc" placeholder="Enter Full Description">{{ old('desc') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" name="image" class="form-control" id="image" placeholder="Select Image">
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
</div>
@endsection
