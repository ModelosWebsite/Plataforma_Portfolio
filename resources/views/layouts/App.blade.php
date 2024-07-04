<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>

  <!-- Vendor CSS Files -->
  <link href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">
  @livewireStyles
</head>

<body>

    @yield("content")

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset("assets/vendor/purecounter/purecounter_vanilla.js")}}"></script>
  <script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("assets/vendor/glightbox/js/glightbox.min.js")}}"></script>
  <script src="{{asset("assets/vendor/swiper/swiper-bundle.min.js")}}"></script>
  <script src="{{asset("assets/vendor/typed.js/typed.umd.js")}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset("assets/js/main.js")}}"></script>
  <script src="{{asset("assets/js/cookies.js")}}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>