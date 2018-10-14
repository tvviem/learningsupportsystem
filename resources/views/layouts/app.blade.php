<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LearningSS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                        <img src="{{asset('images/logo_blu.png')}}" alt="BacLieu Learning Support Logo">
                    </a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Users</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Permissions</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Field &amp; Branches</a>
                </div>
                <div class="navbar-end">
                    @if(!Auth::guest())
                        <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                        <a href="#" class="navbar-item is-tab">Join the Community</a>
                    @else
                        <button class="dropdown is-aligned-right navbar-item is-tab">
                            Hey Viem Trieu <span class="icon"><i class="fa fa-caret-down"></i></span>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="far fa-user-circle"></i></span> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="far fa-bell"></i></span> Notifications
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="fas fa-cog"></i></span> Settings
                                    </a>
                                </li>
                                <li class="separator"></li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                                    </a>
                                </li>
                            </ul>
                        </button>
                    @endif
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

</body>
</html>
