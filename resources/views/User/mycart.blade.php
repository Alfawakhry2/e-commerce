<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amazon Style Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

      TemplateMo 546 Sixteen Clothing

      https://templatemo.com/tm-546-sixteen-clothing

      -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.css">

</head>
<header class="">
    <div class="container">
        <nav class="navbar navbar-expand-lg px-0">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h2>AlFawakhry <em>Store</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('mycart') }}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('showorder') }}">Order</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest

                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link p-1 m-2 text-white" style="border: none; background: none;">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <div class="container mt-5">
            <h2 class="mb-4">🛒 Your Cart</h2>
            @include('success')
            @if (isset($day))
                <h1>The deliver day : {{ $day }}</h1>
            @endif
            @if (isset($cart))
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ($cart as $id => $product)
                            <tr>
                                <td><img src="{{ asset("storage/{$product['image']}") }}" width="80"
                                        class="img-thumbnail" alt="Product"></td>
                                <td>{{ $product['name'] }}</td>
                                <td class="text-primary">${{ $product['price'] }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td class="text-success">${{ $product['Total Price'] }}</td>

                                @php $total += $product['Total Price']; @endphp
                                <td>
                                    <form action="{{ url("delete/item/$id") }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2">Remove</button>
                                    </form>
                                    <button type="submit" class="btn btn-sm btn-primary text-white mt-2 px-2"><a
                                            class="text-white" href="{{ url("show/product/$id") }}">Update</a></button>
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Grand Total:</td>
                            <td class="fw-bold text-bg-success">${{ $total }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <form action="{{ url('make/order') }}" method="POST" class="text-center mt-3">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg px-4">Make Order</button>
                </form>
        </div>
    </div>
@else
    <div class="container mt-5">
        <div class="alert alert-warning text-center">
            😕 Your cart is empty.
        </div>
    </div>
    @endif
    </div>
    </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2025 Alfawakhry

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                target="_blank">Alfawakhry Store</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</header>
