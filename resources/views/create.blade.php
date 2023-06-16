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
        WORK IN PROGRESS
        <div class="card">
            <form action="{{ url('/create') }}" method="POST">
            @csrf
                <div class="card-header">
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col-md-auto">
                            <h3>Survey name:</h3>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="survey_name" id="surveryName" placeholder="Do you know about the game?" @guest readonly @endguest>
                        </div>
                    </div>
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col-md-auto">
                            <h5>Survey description:</h5>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="survey_name" id="surveryName" placeholder="Did you lost or you don't know what's the deal?" @guest readonly @endguest>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                    <div class="form-group" id="questions-container">
                        <!-- dynamic questions will be added here -->
                    </div>
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}" style="margin-bottom: 40px;">
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
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
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
