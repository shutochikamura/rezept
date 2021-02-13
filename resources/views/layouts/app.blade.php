<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rezept') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js', $is_production) }}" defer></script>
    <script src="{{ asset('/js/userDelete.js', $is_production)}}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- GoogleAPIS -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="env('GOOGLE_CLIENT_ID')">

    <!-- Styles -->
    <link href="{{ asset('css/app.css', $is_production) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/recipe.css' ,$is_production)}}">
</head>

<body>
    <div id="">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand rezept-sign " href="{{ url('/',[], $is_production) }}">
                    {{ config('app.name', 'Rezept') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login',[], $is_production) }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register',[], $is_production) }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if(Auth::check())


                        <li class="nav-item">
                            <a class="nav-link" href="{{url ('/board',[], $is_production)}}">{{__('レシピ一覧')}}</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{url ('/board/create',[], $is_production)}}">{{__('レシピ作成')}}</a></li>

                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('manager')
                                @if(Auth::user()->guest_password == null)
                                <a class="dropdown-item" href="{{url('/guest_password', [],$is_production)}}">ゲストパスワード作成</a>
                                @elseif(Auth::user()->guest_password != "")
                                <a class="dropdown-item" href="{{url('/guest_password/edit',[], $is_production)}}">ゲストパスワード変更</a>
                                @endif
                                @endcan
                                <a class="dropdown-item" href="{{url('/home', [],$is_production)}}">ホーム</a>
                                <a class="dropdown-item" href="{{ url('logout',[], $is_production) }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('logout',[], $is_production) }}" method="POST" class="d-none">
                                    @csrf
                                </form>


                                <!-- 退会処理付けようか迷ってます
                                     <a class="dropdown-item mt-4 log_destroy dropdown-state" href="{{url('/log_destroy',[], $is_production)}}" onClick="delete_alert(event);return false;">退会する</a> -->

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
