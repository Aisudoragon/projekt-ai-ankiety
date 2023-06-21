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
    <script src="{{ asset('js/create_form.js') }}"></script>
    <style>
        html {
            background: linear-gradient(90deg, #FCAFF7 0%, #FFC1FB 50%, #A2C1FF 100%), #FFC1FB;
        }
    </style>
    <title>Surveys</title>
</head>
<body>
    @include('nav')
    <div class="container">
        <div class="card">
            <form action="{{ route('create.new') }}" method="POST">
            @csrf
                <div class="card-header">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-auto">
                            <h3>Survey name:</h3>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="form_name" id="formName" placeholder="Enter your survey name" value="{{ old('form_name') }}" maxlength="100" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-auto">
                            <h5>Survey description:</h5>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="form_description" id="formDescription" placeholder="Enter description for your survey" value="{{ old('form_description')}}" maxlength="500">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <h5>Suggested completion time (in minutes):</h5>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="form_time" id="formTime" value="{{ old('form_time') ?? 5 }}" min="1" max="1440">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-info">
                                <strong>Be careful!</strong> You can't change your survey after submitting it. You can only delete it.
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="questions-container">
                        {{-- TUTAJ BĘDĄ SIĘ POJAWIAĆ PYTANIA GENEROWANE PRZEZ UŻYTKOWNIKA --}}
                    </div>
                    <div class="row" style="margin-bottom: 40px;">
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="add-radio-question-btn">Add radio question</button>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="add-checkbox-question-btn">Add checkbox question</button>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="add-text-question-btn">Add text question</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" id="submit-survey-btn">Submit survey</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>
