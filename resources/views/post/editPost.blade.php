<!doctype html>
<html lang="en">

<head>
  @vite(['resources/css/app.css', 'resources/js/edit-post.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Equalearn | Add Post</title>
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
    <div class="row">
      <div class="col">
        <h1>Edit Post</h1>
      </div>
    </div>
    <br>
    <br>
    <form action="{{route('post.edit')}}" method="POST" id="post_form" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <input type="hidden" name="post_id" value="{{$post->id}}">
      <div class="row">
        <div class="col">
          <input type="text" name="post_title" id="title" placeholder="Judul post" class="form-control" value="{{$post->title}}" required>
          <br>
        </div>
      </div>

      <select name="topic" id="topic" class="form-select" required>
        <option value="">Pilih Topik</option>
        @foreach ($topics as $t)
        <option value="{{$t->id}}"
        @if ($t->id == $topic->id) selected
        @endif
        >{{$t->name}}</option>
        @endforeach
      </select>

      <br>

      <select name="grade" id="grade" class="form-select" required>
        <option value="">Pilih Tingkat/Kelas</option>
        @foreach ($grades as $g)
        <option value="{{$g->id}}"
        @if ($g->id == $grade->id) selected
        @endif
        >{{$g->name}}</option>
        @endforeach
      </select>

      <div class="row my-3">
        <div id="editorjs"></div>
      </div>

      <br>

      <input type="text" id="tag-input" class="form-control" placeholder="Enter tags">
      <div id="tag-list"></div>

      <button type="submit" id="btn-submit" class="btn btn-primary">Post</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    window.deleteImageUrl = "{{ route('post.deleteImage') }}";
    window.uploadImageUrl = "{{ route('post.addImage') }}";
    window.fetchLinkUrl = "{{ route('post.fetchLink') }}";
    window.tags = {!! json_encode($tags) !!};
    window.postContent = {!!json_encode($post->content)!!};
    console.log(window.postContent);
  </script>
  <!-- <script src="mix('resources/js/app.js')"></script> -->
</body>

</html>
