<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>REGISTER</h1>
                <br>
                <a href="{{route('login')}}">Login</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="/register/process">
                    @csrf
                    <label for="username">Username</label><input type="text" name="username" id="usernameInput" class="form-control" onkeyup="return forceLower(this);">
                    <label for="full_name">Nama lengkap</label><input type="text" name="fullname" id="fullnameInput" class="form-control">
                    <label for="birthday">Tanggal lahir</label><input type="date" name="birthday" id="birthdayInput" class="form-control">
                    <label for="email">Email</label><input type="email" name="email" id="emailInput" class="form-control">
                    <label for="password">Password</label><input type="password" name="password" id="passwordInput" class="form-control">
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function forceLower(strInput) {
            strInput.value = strInput.value.toLowerCase();
        }
    </script>
</body>

</html>