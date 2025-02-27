<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/auth/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/auth/img/favicon.png  ')}}">
  <title>
    Argon Dashboard 3 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/auth/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/auth/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/auth/css/argon-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    @yield('content')
  </main>
  <!--   Core JS Files   -->


  <script src="{{asset('assets/auth/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/auth/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/auth/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/auth/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/auth/js/argon-dashboard.min.js?v=2.1.0')}}"></script>
</body>

</html>
