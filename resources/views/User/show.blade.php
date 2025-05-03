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
    <style>
        * {
            margin: 0
        }

        .product-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .price {
            font-size: 1.5rem;
            color: #B12704;
        }

        .buy-btn {
            background-color: #FFD814;
            border-color: #FCD200;
            color: #0F1111;
            font-weight: bold;
        }

        .buy-btn:hover {
            background-color: #F7CA00;
        }
    </style>
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
                                <button type="submit" class="nav-link btn btn-link p-1 m-2 text-white"
                                    style="border: none; background: none;">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Product Section (No Margin Top) -->
        <div class="row mt-3">
            <!-- Product Image -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Product Image">
            </div>

            <!-- Product Details -->
            <div class="col-md-7">
                <h1 class="product-title">Product Name: {{ $product->name }}</h1>
                <p class="text-muted">Category: {{ $product->category->name }}</p>
                <hr>
                <p>Description of Product: {{ $product->desc }}</p>
                <ul>
                    <li>High performance</li>
                    <li>1-year warranty</li>
                    <li>Free shipping available</li>
                </ul>
                <hr>
                <div class="price mb-3">Price: ${{ $product->price }}</div>
                <form action="{{ url("add/cart/$product->id") }}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="">Enter Quantity : </label>
                                <input class="form-control" type="number" name="quantity">
                            </div>
                            <div class="col">
                                <button class="btn btn-success btn-lg w-50 mt-3">Add To Cart</button>
                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert bg-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        @if (session()->has('success'))
                            <div class="alert bg-success">{{ session()->get('success') }}</div>
                        @endif
                    </div>
                </form>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


{{-- <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg border-0">
          <div class="row g-0">
            <div class="col-md-5">
              <img src="{{asset("storage/" . $product->image)}}" class="img-fluid rounded-start" alt="Product Image">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text text-muted">{{$product->category->name}}</p>
                <p class="card-text">{{$product->desc}}</p>
                <h4 class="text-success mb-3">{{$product->price}}</h4>
                <button class="btn btn-primary btn-lg w-100">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
