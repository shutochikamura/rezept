@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <h4 class="card-header">まず始めに、</h4>

                <div class="card-body">
                    <form action="/user_role/register" method="post">

                    @csrf
                    <input type="hidden" name="email" value="{{$user->email}}">
                        <div class="col-md-6 offset-md-4 mb-2">
                            <h4　class="your-job">あなたのポジションを教えて下さい</h4>

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
                            <input  style="width:6em;" type="submit" class="btn btn-primary your-job" value="決定">


                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
