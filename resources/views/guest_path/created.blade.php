@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ゲストパスワード設定完了</div>

                <div class="card-body">
                    <p>ゲストパスワードを設定しました</p>
                    <p>メールにて{{Auth::user()->name}}様のゲストパスワードを送信いたしましたので</p>
                    <p>ご確認ください</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
