<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Surveys</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
            aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarID">
            <ul class="navbar-nav mx-auto">
                <li><a class="nav-link" aria-current="page" href="{{ url('/index') }}">Home</a></li>
                <li><a class="nav-link" href="{{ url('/browse') }}">Browse</a></li>
                {{-- <li><a class="nav-link" href="#">Manage</a></li>
                <li><a class="nav-link" href="#">Profile</a></li> --}}
            </ul>
            <a class="btn btn-primary" role="button" href="#" style="margin-right: 5px;">Log in</a>
            <a class="btn btn-primary" role="button" href="#" style="margin-left: 5px;">Sign up</a>
        </div>
    </div>
</nav>
