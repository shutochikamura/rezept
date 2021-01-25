
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<form action="/board" method="post">
@csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <h2>菓子名</h2>

            <input type="text" name="title" value="{{old('title')}}">
            <h2>材料名</h2>
            <textarea name="material" id="material" cols="30" rows="10" value="">{{old('material')}}</textarea>
            <h2>作り方</h2>
            <textarea name="recipe" id="recipe" cols="30" rows="10">{{old('recipe')}}</textarea>
            <input type="submit" value="作成">
</form>


            </div>
        </div>
    </div>
</div>
@endsection
