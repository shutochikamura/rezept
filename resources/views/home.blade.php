@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('ホーム') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('ログインしました!') }}


                </div>
                @cannot('manager')
                <div>
                    <div class="card-header">
                        <h4>別の方のレシピ参照</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{url('/guest_home',[], $is_production)}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="host-name" class="col-md-4 col-form-label text-md-right">{{ __('ホスト名') }}</label>

                                <div class="col-md-6">
                                    <input id="host-name" type="text" class="form-control" name="name" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guest_password" class="col-md-4 col-form-label text-md-right">{{ __('ゲストパスワード') }}</label>
                                <div class="col-md-6">
                                    <input id="guest_password" type="password" class="form-control @error('guest_password') is-invalid @enderror" name="guest_password" required autocomplete="new-password">

                                    @if($home_form != null)
                                    <p>{{$home_form}}</p>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('照会する') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @endcannot

            </div>
        </div>
    </div>
</div>

@endsection
