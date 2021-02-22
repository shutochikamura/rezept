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
                                <div class="m-2">
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

                                <div class="m-2 pt-4 border-top">
                                    <h5 class="rezept-font-body ">試しにお使い下さい</h5>
                                    <a href="{{ url('/login/guest',[], $is_production) }}" class=" btn btn-rezept btn-success">ゲストログイン</a>

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

                    <div class="card-header">
                        <h5>概要</h5>
                    </div>

                    <div class="card-body">
                        <div>
                            <div class="mb-4 mt-2">
                                <h5 class="form-control">
                                    何ができるのか？
                                </h5>
                                <h5>
                                    このwebアプリの中でポジションを持たせ、ポジション間でレシピを共有できるというものです
                                </h5>
                            </div>

                            <h5 class="form-control">どんなポジションがあるのか？</h5>
                            <div class="mt-4">
                                <h5>
                                    ・製造長
                                </h5>
                                <h5>ゲストパスワードを作成して、従業員、研修員に製造長のレシピを共有できます</h5>
                            </div>
                            <div class="mt-4">
                                <h5>
                                    ・従業員
                                </h5>
                                <h5>製造長のレシピを閲覧、編集、追加できます</h5>
                                <h5>自分のレシピ作成可</h5>
                            </div>
                            <div class="mt-4">
                                <h5>・研修員</h5>
                                <h5>製造長のレシピを閲覧できます</h5>
                                <h5>自分のレシピ作成可</h5>
                            </div>
                            <table class="mt-4">
                            <tr><th></th><th class="table-width">製造長</th><th class="table-width">従業員</th><th class="table-width">研修員</th></tr>
                            <tr><td>自分のレシピ作成</td><td>○</td><td>○</td><td>○</td></tr>
                            <tr><td>ゲストパスワード作成</td><td>○</td><td>✖️</td><td>✖️</td></tr>
                            <tr><td>製造長のレシピ閲覧</td><td>-</td><td>○</td><td>○</td></tr>
                            <tr><td>製造長のレシピ編集</td><td>-</td><td>○</td><td>✖️</td></tr>
                            </table>
                        </div>
                        <div class="mt-4">
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-20 13.22.40.png', $is_production)}}" alt="">
                        </div>
                        <!-- <div class="mt-4">
                            <h5 class="mt-2">
                                {{ __('rezept内でポジションを決めて下さい') }}<br>
                                {{__('下の図参照')}}
                            </h5>
                            <h5>※ポジションは一度決めたら変えれません2021/2月</h5>


                            <h5>製造長の方がゲストパスワードを作成して</h5>
                            <h5>
                                従業員、研修員の方が製造長のレシピを閲覧、従業員の方が編集もできるというイメージです
                            </h5>
                            <h5>
                                従業員、研修員は自分自身のレシピの作成にもお使いになれます
                            </h5>
                        </div> -->
                        <!-- <div>
                            <h5 class="mt-4">レシピ一覧画面</h5>
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-20 14.58.18.png', $is_production)}}" alt="">
                        </div>
                        <div>
                            <h5 class="mt-4">スマホ画面</h5>
                            <img class="img-size-mobile" src="{{asset('/images/スクリーンショット 2021-02-20 14.59.38.png', $is_production)}}" alt="">
                        </div> -->
                        <!-- <div>
                            <h5 class="mt-4">レシピ作成画面</h5>
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-18 17.05.03.png',$is_production)}}" alt="">
                        </div>
                        <div>
                            <h5 class="mt-4">レシピ閲覧</h5>
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-20 14.11.35.png',$is_production)}}" alt="">
                        </div>
                        <div>
                            <h5 class="mt-4">レシピ編集画面</h5>
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-20 14.33.05.png',$is_production)}}" alt="">
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
