@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <!--
                @if(Auth::user()->guest_id != null)
                <div class="card-header">

                    {{ __('ホストのレシピ編集') }}
                </div>


                <div class="ml-3">
                    <form action="guest" method="get">
                        @csrf

                        <div class="form-group row mt-4 mb-4 ">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('レシピ編集、閲覧') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    <div class="col-md-6 offset-md-4 mb-2">

                        {{__('別の方を参照する場合')}}

                    </div>
                </div> -->

                @endif
                <div>
                    <div class="card-header">
                        <h4>別の方のレシピ参照</h4>
                    </div>
                    <div class="card-body">
                        <form action="guest_home" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="host-name" class="col-md-4 col-form-label text-md-right">{{ __('HostName') }}</label>

                                <div class="col-md-6">
                                    <input id="host-name" type="text" class="form-control" name="name" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guest_password" class="col-md-4 col-form-label text-md-right">{{ __('GuestPassword') }}</label>
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
            </div>
        </div>
    </div>
</div>
@endsection
