<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @if(app()->environment() == 'development')
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--charts-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <!-- MDBOOTSTRAP IMPORTS/CDN -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- MDBOOTSTRAP IMPORTS/CDN -->

    <!-- This has to be set to secure if we are deployed on Heroku -->
    @if(app()->environment() === 'development')
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm custom-nav">
                <a class="navbar-brand" href="/">
                    <img src="/img/icon-100.png" height="30" alt="mdb logo">
                </a>
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'EsportsOS') }}
                </a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/matchups"><i class="fas fa-gamepad"></i> Matches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/players"><i class="fas fa-user"></i> Players</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/teams"> <i class="fas fa-users"></i>Teams</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} @if(Auth::user()->isAdmin)<i class="fas fa-check-circle"></i>@endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(!Auth::guest() && Auth::user()->isAdmin)
                                    <a class="dropdown-item" href="/admin/match_issues">
                                        <i class="fas fa-bell"></i> Matchup Issues 
                                    </a>
                                    <a class="dropdown-item" href="/admin/match_dashboard">
                                        <i class="fas fa-tachometer-alt"></i> Matchup Dashboard
                                    </a>
                                    <a class="dropdown-item" href="/assets">
                                        <i class="fas fa-video"></i> Stream Assets
                                    </a>
                                    <a class="dropdown-item" href="/api/config">
                                        <i class="fas fa-key"></i> API Config
                                    </a>
                                    <a class="dropdown-item" href="/admin/users">
                                        <i class="fas fa-users"></i> Administrators
                                    </a>
                                    <a class="dropdown-item" href="/logs">
                                        <i class="far fa-file-alt"></i> System Logs
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i> Logout
                                 </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="container">
          <span class="text-muted">EsportsOS - Created by Charlie Burgess (2020/2021)</span>
        </div>
    </footer>
</body>
</html>
