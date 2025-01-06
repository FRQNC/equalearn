<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center">
                <h1>Welcome to Equalearn</h1>
                <p>Please register or login to continue</p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block">Register</a>
                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg btn-block">Login</a>
            </div>
        </div>
    </div>
</body>
</html>