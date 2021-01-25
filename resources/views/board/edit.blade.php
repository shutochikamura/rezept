@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3>teste</h3>


                <div class="card-body board-frame">
                <form action="/board/{{$form->id}}" method="post">
                @method('PATCH')
@csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <h2>菓子名</h2>

            <input type="text" name="title" value="{{$form->title}}">
            <h2>材料名</h2>
            <textarea name="material" id="material" cols="30" rows="10" value="">{{$form->material}}</textarea>
            <h2>作り方</h2>
            <textarea name="recipe" id="recipe" cols="30" rows="10">{{$form->recipe}}</textarea>
            <input type="submit" value="変更">
</form>
<form action="/board/{{$form->id}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="削除">
</form>



                </div>


            </div>
        </div>
    </div>
</div>
@endsection
