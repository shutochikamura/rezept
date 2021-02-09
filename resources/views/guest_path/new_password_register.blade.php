@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('リセットゲストパスワード') }}</div>

                <div class="card-body">
                    <h3>新ゲストパスワード作成画面</h3>
                    <form method="post" action="{{ route('guest_password.password_edit_check') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{Auth::id()}}">

                        <div class="form-group row">
                            <label for="guest_password" class="col-md-4 col-form-label text-md-right">{{ __('ゲストパスワード') }}</label>

                            <div class="col-md-6">
                                <input id="guest_password" type="password" class="form-control @error('guest_password') is-invalid @enderror" name="guest_password" required autocomplete="new-password">

                                @error('guest_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="guest-password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認用ゲストパスワード') }}</label>

                            <div class="col-md-6">
                                <input id="guest-password-confirm" type="password" class="form-control" name="guest_password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新ゲストパスワード作成') }}
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
