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
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile-header">
                <h1>{{ $user->username }}'s profile</h1>
                <img src="{{ asset('storage/' . $user->photo) }}" alt="profile Image" class="mx-auto d-flex my-2">
                <p>{{ $user->fullname }}</p>
                <p>{{ $user->institution }}</p>
                <p>{{ $user->bio }}</p>
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
                                    <td><a href="{{ '/@' . $user->username . '/edit/' . $p->id }}" class="btn btn-primary">Edit</a>
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
                    <a href="{{ route('post.addView') }}" class="btn btn-primary">Buat post</a>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
