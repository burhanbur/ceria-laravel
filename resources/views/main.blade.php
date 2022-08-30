<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CERIA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('images/icon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/dist/css/icons/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('landing/assets/css/style.css') }}" rel="stylesheet">

  @yield('css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center @if (Request::is('/')) header-transparent @endif">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
         <a href="{{ route('root') }}"><img style="max-height: 60px" src="{{ asset('images/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="@if (Request::is('/')) active @endif"><a href="{{ route('root') }}">Beranda</a></li>
          <li class="@if (Request::is('bulletin')) active @endif"><a href="{{ route('bulletin') }}">Buletin</a></li>
          <li><a href="{{ route('login') }}">Masuk</a></li>
        </ul>
      </nav>

    </div>
  </header>

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CERIA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://burhanmafazi.netlify.app/" target="_blank">Burhan Mafazi</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landing/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>

</html>