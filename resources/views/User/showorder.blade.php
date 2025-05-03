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
            <h2 class="text-center mb-4 text-info">My Orders</h2>

            @forelse($orders as $order)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4>Order Code #{{ $order->id }}</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order Date: {{ $order->created_at->format('d M Y') }}</h5>
                        @if($order->role == 0)
                        <p class="card-text">Status: <span class="badge bg-danger">Pending</span></p>
                        @elseif ($order->role ==1)
                        <p class="card-text">Status: <span class="badge bg-success">Confirmed</span></p>
                        @endif
                        <h5>Order Details</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderdetails as $detail)
                                    <tr>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>${{ $detail->product->price }}</td>
                                        <td>${{ $detail->quantity * $detail->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{-- <p class="text-muted">Total Order Value: ${{ $detail->quantity * $detail->price }}</p> --}}
                            <a href="{{ url('showorder') }}" class="btn btn-primary btn-lg">Confirm Order</a>
                        </div>
                    </div>
                </div>
            @empty

            <div class="text-center">
                {{-- <p class="text-muted">Total Order Value: ${{ $detail->quantity * $detail->price }}</p> --}}
                <h2 class="my-2 ">No Order for You </h2>
                <a href="{{ url("") }}" class=" Text-primary btn-lg">Let's Make Order !</a>
            </div>
            @endforelse
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
