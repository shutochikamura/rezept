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
                            <h5>
                                何ができるのか？
                            </h5>
                            <h5>
                                このwebアプリの中でポジションを持たせ、（製造長、従業員、研修員）製造長が持ってるレシピを所属してる従業員、研修員に共有できるというものです
                            </h5>
                            <h5>主に個人店、中小企業（20人未満）のお菓子屋に使っていただければなと思います</h5>
                            <table>
                            <tr><th></th><th>自分のレシピ作成</th><th>ゲストパスワード<br>作成</th><th>製造長のレシピ閲覧</th><th>製造長のレシピ編集</th></tr>
                            <tr><td>製造長</td><td>○</td><td>○</td><td>-</td><td>-</td></tr>
                            <tr><td>従業員</td><td>○</td><td>✖️</td><td>○</td><td>○</td></tr>
                            <tr><td>研修員</td><td>○</td><td>✖️</td><td>○</td><td>✖️</td></tr>

                            </table>
                        </div>
                        <div class="mt-4">
                            <img class="img-size" src="{{asset('/images/スクリーンショット 2021-02-20 13.22.40.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h5 class="mt-2">
                                {{ __('rezept内でポジションを決めて下さい') }}<br>
                                {{__('下の図参照')}}
                            </h5>
                            <h5>※ポジションは一度決めたら変えれません2021/2月</h5>
                            <!-- <img class="img-size" src="{{ asset('/images/スクリーンショット 2021-02-18 20.38.49.png', $is_production)}}" alt=""> -->

                            <h5>製造長の方がゲストパスワードを作成して</h5>
                            <h5>
                                従業員、研修員の方が製造長のレシピを閲覧、従業員の方が編集もできるというイメージです
                            </h5>
                            <h5>
                                従業員、研修員は自分自身のレシピの作成にもお使いになれます
                            </h5>
                        </div>
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





                        <!-- <div class="card-header border-top m-4">
                            <h5>使い方</h5>
                        </div>
                        <div>
                            <h4>もくじ</h4>
                            <ol class="page-contents">
                                <li><a href="#i1">登録</a></li>
                                <li><a href="#i2">ログイン</a></li>
                                <li><a href="#i3">ゲストパスワード作成</a></li>
                                <li><a href="#i4">ゲストパスワードを使って製造長のレシピへ入る</a></li>
                                <li><a href="#i5">ゲストパスワード変更</a></li>
                                <li><a href="#i6">レシピ作成時の注意点</a></li>
                            </ol>
                        </div>
                        <div>
                            <h4 id="i1">登録</h4>
                            <h5>
                                最初に登録画面でメールアドレスとお好きなパスワードを入力して下さい
                            </h5>

                            <img class="img-size" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.24.46.png', $is_production)}}" alt="">
                            <h5>確認画面</h5>
                            <h5>ここで仮登録を押すとメールアドレスに「仮登録メール」が届きます</h5>
                            <img class="img-size" src="{{ asset('/Howtoimages/スクリーンショット 2021-02-20 15.25.26.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.26.19.png', $is_production)}}" alt="">
                            <img class="img-size-mobile" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 16.28.33.png', $is_production)}}" alt="">
                            <h5 class="mt-2">メールアドレスのリンク先をクリックしたら本会員登録の画面に移行します</h5>
                            <h5>ご自身のお名前、ポジションを入力して「確認画面へ」を押して下さい</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.28.38.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.29.04.png', $is_production)}}" alt="">
                            <h5>登録が完了しました</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.29.29.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h4 id="i2">ログイン</h4>
                            <h5>
                                先程登録したメールアドレス、パスワードを入力して青いボタンの
                                「ログイン」を押して下さい

                            </h5>
                            <h5>※10回ログインに失敗すると３０分間ログインできなくなります</h5>
                            <h5>もしくは黒いボタンの「google Login」を使ってgoogleで持っているメールアドレスでログインすることもできます</h5>
                            <h5>緑の「ゲストログイン」は登録しなくてもwebアプリをお試しいただけます</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.30.07.png', $is_production)}}" alt="">
                            <h5 class="m-2">ログインしました</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.31.18.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h4 id="i3">ゲストパスワード作成</h4>
                            <h5>右上のレシピ一覧を押すとレシピ画面に遷移します</h5>

                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.54.26.png', $is_production)}}" alt="">
                            <h5>右上の「ゲストパスワード作成」を押すと従業員、研修員に自分のレシピを共有することができる「ゲストパスワード」を作ることができます</h5>
                            <h5>※製造長のみ</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.33.04.png', $is_production)}}" alt="">
                            <h5>お好きなパスワードを入力して下さい</h5>
                            <h5>※８文字以上、英数字および記号(例：!や?)を含める必要があります</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.34.11.png', $is_production)}}" alt="">
                            <h5>こちらも「ゲストパスワード登録」を押すと確認メールが届きます</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 17.10.53.png', $is_production)}}" alt="">
                            <img class="img-size-mobile mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 17.17.10.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h4 id="i4">ゲストパスワードを使って製造長のレシピへ入る</h4>
                            <h5>※従業員、研修員のみ</h5>
                            <h5>参照したい製造長の名前とゲストパスワードを入力して入ることができます</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.40.52.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.41.43.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.42.10.png', $is_production)}}" alt="">
                            <h5>製造長のレシピ一覧画面へ遷移します</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.54.26.png', $is_production)}}" alt="">
                            <h5>また一度製造長のレシピの中に入ると情報が登録されてよりスムーズに入ることができます</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.43.25.png', $is_production)}}" alt="">
                            <h5>右上にホストのレシピ一覧が追加される</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 16.03.44.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h4 id="i5">ゲストパスワード変更</h4>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.37.09.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.38.06.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 20.10.18.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.38.50.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.39.27.png', $is_production)}}" alt="">
                            <h5>ゲストパスワードが変更された状態で製造長のレシピの中に入ることはできません</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.43.25.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 20.17.30.png', $is_production)}}" alt="">
                        </div>
                        <div class="mt-4">
                            <h4 id="i6">レシピ作成時の注意点</h4>
                            <h5 class="bg-warning">素材のところ一列開けて入力してしまうとそれ以降の列が全て入力されなくなってしまいます</h5>
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.50.34.png', $is_production)}}" alt="">
                            <img class="img-size mt-2" src="{{ asset('/HowtoImages/スクリーンショット 2021-02-20 15.52.07.png', $is_production)}}" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
