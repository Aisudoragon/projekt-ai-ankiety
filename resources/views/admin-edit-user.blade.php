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
    <style>
        html {
            background: linear-gradient(90deg, #cef1ff 0%, #ffdde4 25%, #ffffff 50%, #ffdde4 75%, #cef1ff 100%), #FFC1FB;
        }
    </style>
    <title>Surveys</title>
</head>
<body>
    @include('nav')
    <div class="container">
        <div class="col d-flex justify-content-center">
            <div class="card" style="width:30rem;">
                <div class="card-body">
                    <form action="{{ route('admin.update.user') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row form-group" style="margin-bottom: 25px;">
                            <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col">
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row form-group" style="margin-bottom: 25px;">
                            <label for="login" class="col-sm-3 col-form-label">Login</label>
                            <div class="col">
                                <input type="text" name="login" class="form-control" placeholder="Login" value="{{ $user->login }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row form-group" style="margin-bottom: 10px;">
                            <label for="password" class="col-sm-4 col-form-label">New password <small>(optional)</small></label>
                            <div class="col">
                                <input type="password" name="password" class="form-control" placeholder="New password">
                            </div>
                        </div>
                        <div class="row form-group" style="margin-bottom: 25px;">
                            <label for="confirm_password" class="col-sm-4 col-form-label">Confirm new password</label>
                            <div class="col">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Confirm changes</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
