
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
                            <form method="POST" action="{{ route('register.main_check') }}">
                                @csrf
                                <input type="hidden" name="email_token" value="{{$email_token}}">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                                    <div class="col-md-6">
                                        <input
                                            id="name" type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <h4　class="col-md-4 col-form-label text-md-left">あなたの役職を教えて下さい</h4>
                                @if ($errors->has('role'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                <div>
                                    <label  for="role-manager" class="col-md-4 col-form-label text-md-right">製造長</label>
                                    <input name="role" type="radio" id="role-manager" value="1">
                                </div>
                                <div>
                                    <label  for="role-employee" class="col-md-4 col-form-label text-md-right">従業員</label>
                                    <input name="role" type="radio" id="role-employee" value="5">
                                </div>
                                <div>
                                    <label  for="role-trainee" class="col-md-4 col-form-label text-md-right">研修生</label>
                                    <input name="role" type="radio" id="role-trainee" value="9">
                                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    確認画面へ
                                </button>
                            </div>
                        </div>
                        </form>
                </div>
                @endempty
            </div>
        </div>
    </div>
    </div>
@endsection