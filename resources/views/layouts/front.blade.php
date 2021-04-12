 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('front')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('front')}}/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    @include('includes.header')
    
    
   @yield('content')
    
  @include('includes.footer')
    
  </div>

  <script src="{{asset('front')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('front')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('front')}}/js/jquery-ui.js"></script>
  <script src="{{asset('front')}}/js/popper.min.js"></script>
  <script src="{{asset('front')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('front')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('front')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('front')}}/js/jquery.countdown.min.js"></script>
  <script src="{{asset('front')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('front')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('front')}}/js/aos.js"></script>

  <script src="{{asset('front')}}/js/main.js"></script>


  </body>
</html>