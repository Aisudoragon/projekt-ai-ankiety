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
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
            <div class="col text-center">
                <h1 class="display-6">Welcome back!</h1>
            </div>
        </div>
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
            <div class="col d-flex justify-content-center">
                <div class="card text-center" style="width:20rem;">
                  <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <label for="loign">Login</label>
                        <input type="text" name="login" class="form-control" placeholder="Login" style="margin-bottom: 25px;">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" style="margin-bottom: 30px;">
                        <button type="submit" class="btn btn-primary">Log in</button>
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-top: 50px;">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
