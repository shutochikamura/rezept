@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">本会員登録</div>

                @isset($message)
                <div class="card-body">
                    {{$message}}
                </div>
                @endisset

                @empty($message)
                <div class="card-body">
                    <form method="POST" action="{{ secure_url('register.main_check') }}">
                        @csrf
                        <input type="hidden" name="email_token" value="{{$email_token}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4 mb-2">
                            <h4　class="your-job">あなたのポジションを教えて下さい</h4>


                            @if ($errors->has('role'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="mb-4 retister-role-div">

                            <div class=" register-role">

                                <label for="role-manager" class="row-col-md-2 col-form-label text-md-right offset-md-4">製造長</label>

                                <input class="" name="role" type="radio" id="role-manager" value="1">

                            </div>

                            <div class="register-role">

                                <label for="role-employee" class="row-col-md-2 col-form-label text-md-right offset-md-4">従業員</label>

                                <input name="role" type="radio" id="role-employee" value="5">

                            </div>

                            <div class="register-role">

                                <label for="role-trainee" class="row-col-md-2 col-form-label text-md-right offset-md-4">研修生</label>

                                <input name="role" type="radio" id="role-trainee" value="9" checked>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4 mb-2">
                            <button type="submit" class="btn btn-primary your-job">
                                確認画面へ
                            </button>
                        </div>


                    </form>
                </div>
                @endempty
            </div>
        </div>
    </div>
</div>
@endsection
