<!doctype html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/read-editor.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Equalearn | Read Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
                @if(!Auth::check()) disabled @endif>Like</button>  <p id="like-data">{{$post->like_data['like_count']}}</p>
            </div>
            <div class="col">
            <button id="dislike-button" class="btn border
            @if(Auth::check() && in_array(Auth::user()->id, $post->like_data['dislike_users_id'])) btn-danger @endif"
                @if(!Auth::check()) disabled @endif>Dislike</button> <p id="dislike-data">{{$post->like_data['dislike_count']}}</p>
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
        window.postContent = {!!json_encode($post->content)!!}
    </script>
</body>

</html>