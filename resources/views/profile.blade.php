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
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="col d-flex justify-content-center">
            <div class="card" style="width:30rem;">
                <div class="card-body">
                    <form action="{{ route('update.email') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"  style="margin-bottom: 25px;" value="{{ $user->email }}" maxlength="255">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Change e-mail</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('update.login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="login" class="form-control" placeholder="Login" style="margin-bottom: 25px;" value="{{ $user->login }}" maxlength="20">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Change login</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('update.password') }}" method="POST">
                        @csrf
                        <label for="previous_password">Previous password</label>
                        <input type="password" name="previous_password" class="form-control" placeholder="Previous password" style="margin-bottom: 25px;">
                        <label for="password">New password</label>
                        <input type="password" name="password" class="form-control" placeholder="New password" style="margin-bottom: 25px;" maxlength="20">
                        <label for="confirm_password">Confirm new password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password" style="margin-bottom: 25px;" maxlength="20">
                        <button type="submit" class="btn btn-primary">Change password</button>
                    </form>
                    <hr />
                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE PROFILE</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
