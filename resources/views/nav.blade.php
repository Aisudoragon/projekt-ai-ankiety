<nav class="navbar navbar-expand-sm navbar-light" style="margin-bottom: 30px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/index') }}">Surveys</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
            aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarID">
            <ul class="navbar-nav mx-auto">
                <li><a class="nav-link" aria-current="page" href="{{ url('/index') }}">Home</a></li>
                <li><a class="nav-link" href="{{ url('/browse') }}">Browse</a></li>
                @auth
                    <li><a class="nav-link" href="{{ url('/manage') }}">Manage</a></li>
                    @if(Auth::user()->permission_id >= 2)
                        <li><a class="nav-link" href="{{ route('admin') }}">ADMIN</a></li>
                    @endif
                @endauth
            </ul>
            @auth
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->login }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Log out</a>
                </div>
            </div>
            @else
                <a class="btn btn-primary" role="button" href="{{ url('/login')}}" style="margin-right: 5px;">Log in</a>
                <a class="btn btn-primary" role="button" href="{{ url('/register')}}" style="margin-left: 5px;">Sign up</a>
            @endauth
        </div>
    </div>
</nav>
