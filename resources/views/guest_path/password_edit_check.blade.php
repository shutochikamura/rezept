@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新ゲスト用パスワード確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('guest_password.password_new_registered') }}">
                        @csrf



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">ゲストパスワード</label>
                            <input type="hidden" name="id" value="{{Auth::id()}}">
                            <div class="col-md-6">
                                <span>{{$form}}</span>
                                <input type="hidden" name="guest_password" value="{{$form}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ゲストパスワード登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
