@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <h3>ゲストパスワード変更画面</h3>
                    <form method="post" action="{{ url('guest_password.update',[],$is_production) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::id()}}">
                        <div>
                            @if($form)
                            <p class="red">{{$form}}</p>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('現在のゲストパスワード') }}</label>
                            <div class="col-md-6">
                                <input id="guest_password" type="password" class="form-control @error('password') is-invalid @enderror" name="guest_password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
