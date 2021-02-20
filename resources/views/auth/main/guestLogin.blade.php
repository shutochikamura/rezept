@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <h5 class="card-header">ゲストログイン</h5>

                <div class="card-body ">
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <form action="{{ url('/login/manager', [], $is_production) }}" method="get">
                                @csrf

                                <button type="submit" class="btn btn-secondary guest-btn m-2">
                                    製造長でログイン
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <form action="{{ url('/login/employee', [], $is_production) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-dark guest-btn m-2 employee-btn">
                                    従業員でログイン
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <form action="{{ url('/login/trainee', [], $is_production) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary guest-btn m-2 trainee-btn">
                                    研修員でログイン
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
