<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Equalearn | Read Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{$user->username}} Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Username: {{$user->username}}</p>
                <p>Fullname: {{$user->fullname}}</p>
                <p>Institution: {{$user->institution}}</p>
                <p>Bio: {{$user->bio}}</p>
                <p><b>Posts</b></p>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Grade</th>
                        <th>Topic</th>
                        @if (Auth::check() && Auth::user()->id == $user->id)
                        <th>Edit</th>
                        <th>Delete</th>
                        @endif
                    </tr>
                    @foreach ($posts as $p)
                    <tr>
                        <td><a href="{{ '/@' . $user->username . '/' . $p->title}}">{{$p->title}}</a></td>
                        <td>{{$p->grade->name}}</td>
                        <td>{{$p->topic->name}}</td>
                        @if (Auth::check() && Auth::user()->id == $user->id)
                        <td><a href="{{ '/@' . $user->username . '/' . $p->title . '/edit' }}">Edit</a></td>
                        <td><a href="{{ '/@' . $user->username . '/' . $p->title . '/delete' }}">Delete</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
            @if (Auth::check() && Auth::user()->id == $user->id)
                <a href="{{route('post.addView')}}" class="btn btn-primary">Buat post</a>
            @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>