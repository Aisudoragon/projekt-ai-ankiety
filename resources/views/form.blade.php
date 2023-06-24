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
            background: linear-gradient(90deg, #ffb787 0%, #ffffff85 50%, #c485ac 100%), #FFC1FB;
        }
    </style>
    <title>Surveys</title>
</head>
<body>
    @include('nav')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $form->name }}</h3>
                <h5>{{ $form->description }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('fill', ['id' => $form->id]) }}" method="POST">
                @csrf
                @foreach ( $questions as $q )
                    <h5 class="card-title">{{ $q->name }}</h5>
                        <p class="card-text">
                            @if ($q->answer_type == 'text')
                                <input type="text" class="form-control" name="answer_{{ $q->id }}_text" id="answer{{ $q->id }}" placeholder="Your answer here" @guest readonly @endguest required maxlength="250">
                            @endif
                            @foreach ( $answers[$q->id] as $a )
                                <div class="form-check">
                                    <input class="form-check-input" type="{{$q->answer_type}}"
                                        @if ($q->answer_type == 'radio')
                                            name="answer_{{ $q->id }}_radio" required
                                        @endif
                                        @if ($q->answer_type == 'checkbox')
                                            name="answer_{{ $q->id }}_checkbox[]"
                                        @endif
                                        value="{{ $a->id }}" id="answer{{ $a->id }}" @guest disabled @endguest>
                                    <label class="form-check-label" for="answer{{ $a->id }}">
                                        {{ $a->name }}
                                </div>
                            @endforeach
                        </p>
                @endforeach
                @auth
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </div>
                @else
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col d-flex justify-content-center">
                            <h3>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to fill and submit your answers</h3>
                        </div>
                    </div>
                @endauth
                </form>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
