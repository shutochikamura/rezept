<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Rezept</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/recipe.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/recipe.css')}}">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
        <div>
            <h1 class="rezept-sign ml-3">Rezept</h1>

        </div>
    </nav>
    <div class="rezept">
        <div class="container row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default ">
                    <div class="rezept-header ">
                        <h3 class="rezept-font">パティシエの従業員間</h3>
                        <h3 class="rezept-font">共有レシピ</h3>
                    </div>
                    <div class="rezept-body">

                        <div>
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ">
                                @auth
                                <div class="m-3 pl-3">
                                    <h3 class="rezept-font-body">この度は使っていただきありがとうございます</h3>
                                    <h3 class="rezept-font-body">ホームへ行く</h3>
                                    <a href="{{ url('/home') }}" class="text-gray-700  btn btn-rezept">Home</a>
                                </div>
                                @else
                                <div class="m-2">
                                    <h3 class="rezept-font-body">ログインはこちら</h3>
                                    <a href="{{ route('login') }}" class="text-gray-700 btn btn-rezept">Login</a>
                                </div>
                                <div class="m-2">
                                    <h3 class="rezept-font-body">登録はこちら</h3>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class=" text-sm text-gray-700 btn btn-rezept">Register</a>
                                </div>
                                @endif
                                @endauth
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        test
    </div>

</body>

</html>
