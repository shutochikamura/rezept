@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ゲスト用パスワード変更完了</div>

                <div class="card-body">
                    <p>ゲスト用パスワードを変更いたしました。</p>
                    <p>{{Auth::user()->name}}様のメールアドレスに</p>
                    <p>送信しましたのでご確認ください。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
