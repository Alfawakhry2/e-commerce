@extends('Admin.layout')

@section('body')

@include('success')
@include('errors')

<table class="table table-bordered">
    <thead class="table-light">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    @if (!isset($category))
        <tbody class="text-center">
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->category['name'] }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $product->desc }}">
                            {{ Str::limit($product->desc, 50)}}
                        </span>
                    </td>
                    <td>
                        <img src="{{ asset("storage/$product->image") }}" width="100px" alt="">
                    </td>
                    <td class="text-center">
                        <!-- Show button (larger size) -->
                        <a class="btn btn-success btn-lg mb-2" href="{{ url("product/$product->id") }}">Show</a><br>

                        <!-- Edit and Delete buttons (smaller size) next to each other -->
                        {{-- <div class="d-flex justify-content-center">
                            <a class="btn btn-primary btn-sm mx-1" href="{{ url("product/edit/$product->id") }}">Edit</a>
                            <form action="{{ url("product/delete/$product->id") }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                            </form>
                        </div> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>


    @else
        <tbody>
            @foreach ($category->product as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->category['name'] }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 200px;">
                            {{ \Illuminate\Support\Str::limit($product->desc, 50, '...') }}
                        </span>
                    </td>
                    <td>
                        <img src="{{ asset("storage/$product->image") }}" width="100px" alt="">
                    </td>
                    <td class="text-center">
                        <!-- Show button (larger size) -->
                        <a class="btn btn-success btn-lg mb-2" href="{{ url("product/$product->id") }}">Show</a><br>

                        <!-- Edit and Delete buttons (smaller size) next to each other -->
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary btn-sm mx-1" href="{{ url("product/edit/$product->id") }}">Edit</a>
                            <form action="{{ url("product/delete/$product->id") }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endif
</table>
<div class="container my-4">
    <div class="d-flex justify-content-center">
        <div class=" p-3">
            @if (!isset($category))
                {{ $products->links() }}
            @else
                {{ $products->links() }}
            @endif
        </div>
    </div>
</div>


@endsection


{{-- <script>
    // Enable Bootstrap tooltips
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script> --}}
