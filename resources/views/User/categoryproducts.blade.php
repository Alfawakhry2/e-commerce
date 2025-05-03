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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <style>
        .banner .banner-item {
    height: 250px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    padding: 20px;
}

.text-content h4 {
    font-size: 16px;
    margin-bottom: 5px;
}

.text-content h2 {
    font-size: 22px;
    font-weight: bold;
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
                            <button type="submit" class="nav-link btn btn-link p-1 m-2 text-white" style="border: none; background: none;">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
    {{-- <div class="container mt-0">
        <div class="banner header-text">
            <div class="container my-0">
                <h3 class="text-center mb-4">Shop by Category</h3>
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
    </div> --}}

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="{{ url("") }}">view all products <i class="fa fa-angle-right"></i></a>
                        <form class="" action="{{ url("search")}}" method="GET">
                            <input type="hidden" name="from" value="catpro">
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
                            <p class="card-text text-muted small">{{ Str::limit($product->desc, 50) }}</p>
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
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row ">
                <div class=" footer text-white py-3 mt-auto col-md-12">
                    <div class="inner-content ">
                        <p>Copyright &copy; 2025 Alfawakhry

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                target="_blank">Alfawakhry Store</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.category-carousel').owlCarousel({
                loop:true,
                margin:15,
                nav:true,
                autoplay:true,
                autoplayTimeout:3000,
                responsive:{
                    0:{ items:1 },
                    600:{ items:2 },
                    1000:{ items:3 }
                }
            });
        });
    </script>

</header>
