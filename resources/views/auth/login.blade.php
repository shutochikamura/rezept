@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('login',[], $is_production) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('パスワードを覚えておく') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードをお忘れですか？') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="form-group row mt-2 pt-2 googleApi">
                        <div class="col-md-8 offset-md-4">
                            <h4 class="col-form-label ">もしくは</h4>
                            <a href="{{url('/login/google',[],$is_production)}}" class="btn btn-secondary" role="button">
                                Google Login
                            </a>
                            @if($glmessage ?? '')
                            <label class="mt-3  text-danger" for="">
                                {{ $glmessage }}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-md-8 offset-md-4">
                            <form action="{{ url('/login/guest',[], $is_production) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-success guest-btn">
                                    ゲストログイン
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/google.js', $is_production)}}"></script>
@endsection
