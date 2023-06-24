@yield('nav')
@yield('footer')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Surveys</title>
</head>
<body>
    @include('nav')
    <div class="container" style="margin-top: 24px;">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul style="margin-bottom: 0px;">
                    @foreach ($errors->all() as $error)
                        <li style="list-style-type: none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col text-center">
                <h1 class="display-6">Another surveyed is coming!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card text-center" style="width:20rem;">
                  <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Login" required style="margin-bottom: 25px;" required value="{{ old('login') }}">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required style="margin-bottom: 25px;" required value="{{ old('email') }}">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required style="margin-bottom: 25px;" required>
                        <label for="password_confirmation">Password confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password" required style="margin-bottom: 25px;" required>
                        <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Register</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
