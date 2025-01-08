<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile-header">
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->followers }} Followers</p>
                <p>{{ $user->description }}</p>
            </div>
        </div>
        <div class="content">
            <div class="articles">
                @foreach($articles as $article)
                    <div class="article">
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->description }}</p>
                        <p class="stats">
                            Published on: {{ $article->date }} |
                            Views: {{ $article->views }} |
                            Comments: {{ $article->comments }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>