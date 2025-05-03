{{-- <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div> --}}
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                <h2>@lang('message.Alfawakhry Store')</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">{{ __('message.Home') }}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('mycart') }}">{{ __('message.Cart') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('showorder') }}">Order</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">@lang('message.Contact Us')</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('message.Login')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@lang('message.Register')</a>
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
                    @if (session()->get('locale') == 'en')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('locale/ar') }}">عربي</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('locale/en') }}">English</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
