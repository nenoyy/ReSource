<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=dc0c51e9-ea0f-4233-9747-5fb9f35076ca" type="text/javascript"></script>
    <script src="/public/assets/js/script.js" type="text/javascript"></script>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="/public/assets/css/style.css" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ReSource') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" style="font-size: 25px" href="{{ route('guide') }}">{{ __('Справочник') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-dark" style="font-size: 25px" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="btn btn-outline-dark">
                                    <a class="nav-link" style="font-size: 25px; padding: 0px" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="btn btn-outline-dark" style="font-size: 25px" href="{{ route('shop') }}">{{ __('Магазин') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-dark" style="font-size: 25px" href="{{ route('material') }}">{{ __('Заказ') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-dark" style="font-size: 25px" href="{{ route('personal') }}">{{ __('Личный кабинет') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-size: 25px" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="font-size: 25px" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="coins" style="display: flex; margin-top: 8px; margin-left: 20px">
                                    <h5 style="font-size: 25px">{{auth()->user()->coins()}}</h5>
                                    <img src="/public/assets/img/coin.png" class="card-img-top" width="30" height="30" alt="coin">
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
