<!doctype html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Equalearn | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            width: 25%;
            padding: 20px;
            border-right: 1px solid #eaeaea;
        }

        .content {
            width: 75%;
            padding: 20px;
        }

        .profile-header {
            text-align: center;
        }

        .profile-header h1 {
            margin-bottom: 5px;
        }

        .articles {
            margin-top: 20px;
        }

        .article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            background: #fafafa;
        }

        .article h2 {
            margin: 0 0 10px;
        }

        .article p {
            margin: 0;
        }

        .stats {
            font-size: 14px;
            color: #888;
        }

        .profile-img {
            width: 100px;
            /* Sesuaikan ukuran gambar */
            height: 100px;
            border-radius: 50%;
            /* Jika ingin membuat gambar berbentuk lingkaran */
            margin-bottom: 10px;
            /* Menambah jarak antara gambar dan teks */
        }
    </style>
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
        <div class="sidebar">
            <div class="profile-header">
                <h1>{{ $user->username }}'s profile</h1>
                <img src="{{ asset('storage/' . $user->photo) }}" alt="profile Image"
                    class="mx-auto d-flex my-2">
                <p>{{ $user->fullname }}</p>
                <p>{{ $user->institution }}</p>
                <p>{{ $user->bio }}</p>
                @if (Auth::check() && Auth::user()->id == $user->id)
                <a href="/logout" class="btn btn-danger"><i class='bx bx-log-out bx-flip-horizontal'></i>Log out</a>

                @endif
            </div>
        </div>

        <div class="content">
            <h2>Posts</h2>
            <div class="articles">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Grade</th>
                            <th>Topic</th>
                            @if (Auth::check() && Auth::user()->id == $user->id)
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $p)
                        <tr>
                            <td><a href="{{ '/@' . $user->username . '/' . $p->title }}">{{ $p->title }}</a>
                            </td>
                            <td>{{ $p->grade->name }}</td>
                            <td>{{ $p->topic->name }}</td>
                            @if (Auth::check() && Auth::user()->id == $user->id)
                            <td><a href="{{ '/@' . $user->username . '/edit/' . $p->id }}"
                                    class="btn btn-primary">Edit</a>
                            </td>
                            <td><button class="btn btn-danger"
                                    onclick="deletePost('{{ $p->id }}', '{{ $p->user_id }}')">Delete</button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (Auth::check() && Auth::user()->id == $user->id)
                <a href="{{ route('post.addView') }}" class="btn btn-primary">Buat post</a><br><br>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
