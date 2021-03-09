<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">TWGroup Test</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publications.list') }}">Publicaciones</a>
          </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>

{{--
<nav>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ route('home') }}" >Home</a>
            @else
                <a href="{{ route('login') }}" >Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

</nav>
--}}
