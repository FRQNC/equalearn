<!doctype html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/read-editor.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Equalearn | Read Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Main CSS File -->
    <link href="{{ asset('assets/landing/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('landing') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Equalearn</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}">Home<br></a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    {{-- <li><a href="{{ route('article') }}" class="{{ request()->routeIs('article') ? 'active' : '' }}">Article</a></li>
                    <li><a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'active' : '' }}">Events</a></li> --}}
                    {{-- <li><a href="events.html">Events</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> --}}
                    {{-- <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @if(!Auth::check())
            <a class="btn-getstarted" href="{{ route('login') }}">Sign In</a>
            <a class="btn-getstarted" href="{{ route('register') }}">Register</a>
            @else
            <a class="btn-getstarted" href="{{'/@'. Auth::user()->username}}">Profile</a>
            @endif

        </div>
    </header>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h3 id="title">{{$post->title}}</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 id="author">Penulis: {{$author}}</h3>
                    <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Grade: {{$grade->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Topik: {{$topic->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button id="like-button" class="btn border
                @if(Auth::check() && in_array(Auth::user()->id, $post->like_data['like_users_id'])) btn-primary @endif"
                    @if(!Auth::check()) disabled @endif>Like</button>
                <p id="like-data">{{$post->like_data['like_count']}}</p>
            </div>
            <div class="col">
                <button id="dislike-button" class="btn border
            @if(Auth::check() && in_array(Auth::user()->id, $post->like_data['dislike_users_id'])) btn-danger @endif"
                    @if(!Auth::check()) disabled @endif>Dislike</button>
                <p id="dislike-data">{{$post->like_data['dislike_count']}}</p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <div id="editorjs"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="tag-list">
                    <p> Tags:
                        @foreach ($tags as $tag)
                        {{$tag->name}},
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.deleteImageUrl = "{{ route('post.deleteImage') }}";
        window.uploadImageUrl = "{{ route('post.addImage') }}";
        window.fetchLinkUrl = "{{ route('post.fetchLink') }}";
        window.postId = "{{$post->id}}"
        window.rateUrl = "{{ route('post.rate') }}"
        window.postContent = {!!json_encode($post->content) !!}
    </script>
</body>

</html>
