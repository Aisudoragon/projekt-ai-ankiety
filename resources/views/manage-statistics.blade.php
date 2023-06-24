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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $form->name }}</h3>
                <h5>{{ $form->description }}</h5>
            </div>
            <div class="card-body">
                @foreach ( $questions as $q )
                    @if ($q->answer_type == 'text')
                        <h5>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{ $q->name }}
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            @foreach ($q->getChoices as $answer)
                                    <p>{{ $answer->text }}</p>
                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </h5>
                        <p></p>
                    @else
                        <h5 class="card-title">{{ $q->name }}</h5>
                        <p class="card-text">
                            @foreach ( $answers[$q->id] as $a )
                                <div class="row">
                                    <div class="col">
                                        {{ $a->name }}
                                    </div>
                                    <div class="col">
                                        <p>{{ $responsesCount[$q->id][$a->id] ?? 0 }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </p>
                    @endif
                @endforeach
                <hr>
                <div class="row">
                    <div class="col">
                        <p>Total responses:</p>
                    </div>
                    <div class="col">
                        <p class="card-text">{{ $answersCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
