<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Rezept</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js', $is_production) }}" defer></script>
    <script src="{{ asset('js/recipe.js', $is_production) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css', $is_production) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/recipe.css', $is_production)}}">
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
                                    <a href="{{ url('/home',[], $is_production) }}" class="text-gray-700  btn btn-rezept">Home</a>
                                </div>
                                @else
                                <div class="m-2">
                                    <h3 class="rezept-font-body">ログインはこちら</h3>
                                    <a href="{{ url('login',[], $is_production) }}" class="text-gray-700 btn btn-rezept">ログイン</a>
                                </div>
                                <div class="m-2">
                                    <h3 class="rezept-font-body">初めての方はこちら</h3>
                                    @if (Route::has('register'))
                                    <a href="{{ url('register',[], $is_production) }}" class=" text-sm text-gray-700 btn btn-rezept">登録</a>
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

    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('使い方') }}</div>

                <div class="card-body">
                    <div>
                        <h5 class="mt-4">レシピ一覧画面（サンプル）</h5>
                        <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-18 14.33.57.png', $is_production)}}" alt="">
                    </div>
                    <div>
                        <h5 class="mt-4">スマホ画面（サンプル）</h5>
                        <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-18 14.34.33.png', $is_production)}}" alt="">
                    </div>
                    <div>
                        <h5 class="mt-4">レシピ作成画面</h5>
                        <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-18 17.05.03.png',$is_production)}}" alt="">
                    </div>
                    <div>
                    <h5 class="mt-4">
                        {{ __('rezept内でポジションを決めて下さい') }}<br>
                        {{__('下の図参照')}}
                    </h5>
                    <h5>※ポジションは一度決めたら変えれません2021/2月</h5>
                    <img class="img-size" src="{{ asset('/images/スクリーンショット 2021-02-18 20.38.49.png', $is_production)}}" alt="">
                        <h5>製造長の方がゲストパスワードを作成して</h5>
                        <h5>
                            従業員、研修員の方がレシピを閲覧、従業員の方が編集もできるというイメージです
                        </h5>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</body>

</html>
