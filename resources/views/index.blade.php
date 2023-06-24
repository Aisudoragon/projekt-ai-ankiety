@yield('nav')
@yield('footer')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Surveys</title>
</head>

<body>
    @include('nav')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('deleted'))
            <div class="alert alert-success">
                <p>{{ session('deleted') }}</p>
            </div>
        @endif
        @guest
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Welcome to Surveys</h1>
                </div>
            </div>
            <div class="row" style="margin-bottom: 24px">
                <div class="col-md-12">
                    <p class="text-center">Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to create and fill surveys for free!</p>
                </div>
            </div>
        @endguest
        @auth
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">You're now logged in</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 24px">
            <div class="col-md-12">
                <p class="text-center">In the navigation there's everything you need</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="margin-bottom: 24px">
            <div class="col-md-auto">
                <ul>
                    <li>Home - this page</li>
                    <li>Browse - Browse surveys to fill</li>
                    <li>Manage - Your surveys, you can create and check statistics here</li>
                    <li>Profile - Your profile</li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
    @include('footer')
</body>

</html>
