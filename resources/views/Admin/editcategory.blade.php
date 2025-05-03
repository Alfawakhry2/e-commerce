@extends("Admin.layout")
@section('body')
@include('errors')
<div class="form">
    <div class="text-center">
        <h2 >Update Category</h2>
    </div>
<form method="POST" action="{{ url("updatecategory/$category->id") }}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}" placeholder="Enter Category Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Category Simple Description</label>
        <input type="text" name="small_desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->small_desc}}" placeholder="Enter Simple Description"></input>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Category Full Description</label>
        <input type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->desc}}" placeholder="Enter Full Description">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">old image</label>
        <img src="{{asset("storage/$category->image")}}" width="100" alt="" srcset=""><br>
        <label for="exampleInputEmail1">Category Image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->image}}" placeholder="Select Image">
    </div>


    <button type="update" class="btn btn-primary">Update</button>
</form>
</div>
@endsection
