@extends('layouts.auth-layout')
@section('content')
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{route('landing')}}">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{route('register')}}">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{route('login')}}">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          {{-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pt-4">
            <h5>Register</h5>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="/register/process">
              @csrf
              <div class="mb-3">
                <input type="text" name="username" id="usernameInput" onkeyup="return forceLower(this);" class="form-control" placeholder="Username" aria-label="username">
              </div>
              <div class="mb-3">
                <input type="text" name="fullname" id="fullnameInput" class="form-control" placeholder="Full Name" aria-label="full_name">
              </div>
              <div class="mb-3">
                <input type="date" name="birthday" id="birthdayInput" class="form-control" placeholder="" aria-label="birthday">
              </div>
              <div class="mb-3">
                <input type="email" name="email" id="emailInput" class="form-control" placeholder="Email" aria-label="email">
              </div>
              <div class="mb-3">
                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password" aria-label="password">
              </div>
              <div class="form-check form-check-info text-start">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
              </div>
              <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{route('login')}}" class="text-dark font-weight-bolder">Sign in</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function forceLower(strInput) {
        strInput.value = strInput.value.toLowerCase();
    }
  </script>
@endsection
