<!DOCTYPE html>
<html lang="en">

<head>

@include('User.head')
<title>@yield('title')</title>

</head>

<body>

@include('User.nav')
<!-- Page Content -->
<!-- Banner Starts Here -->

{{-- @include('User.banner') --}}
@yield('banner')
<!-- Banner Ends Here -->
@yield('body')
{{-- @include('User.about') --}}
{{-- <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}


@include('User.foooter')

</body>

</html>
