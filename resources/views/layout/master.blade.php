<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar/">
    <title>Aifa Nur Amalia - Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap-theme.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Aifa Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href={{url('home')}}>Home</a></li>
                    <li><a href={{url('gallery')}}>Gallery</a></li>
                    <li><a href={{url('articles')}}>Articles</a></li>
                    <li><a href={{url('about')}}>About</a></li>
                    <li><a href={{url('contact')}}>Contact</a></li>
                    <li><a href={{url('collection')}}>Collection</a></li>
                    <li><a href={{url('story')}}>Story</a></li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><strong>{{ __('Login') }}</strong></a>
                    </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><strong>{{ __('Register') }}</strong></a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container theme-showcase" role="main">
        @yield('home')
        @yield('gallery')
        @yield('contact')
        @yield('about')
        @yield('collection')
        @yield('story')

        @yield('content')
        @yield('create')
        @yield('edit')
        @yield('show')

        @yield('pdf')
        <br>
    </div>
    <div class="panel-footer">
        <p>Laravel Training at GeeksFarm 2019</p>
    </div>

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>