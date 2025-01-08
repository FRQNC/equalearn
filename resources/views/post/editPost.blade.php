<!doctype html>
<html lang="en">

<head>
  @vite(['resources/css/app.css', 'resources/js/edit-post.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Equalearn | Add Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
