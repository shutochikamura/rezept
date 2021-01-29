@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card-body board-frame">
                    <form action="/board/{{$form->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <h2>菓子名</h2>

                        <input type="text" name="title" value="{{$form->title}}">
                        <h2>菓子の種類</h2>



                        <input type="radio" name="state" value="1" checked>生菓子
                        <input type="radio" name="state" value="2">焼き菓子
                        <input type="radio" name="state" value="3">チョコレート
                        <input type="radio" name="state" value="4">季節もの
                        <input type="radio" name="state" value="5">パン
                        <input type="radio" name="state" value="6">その他
                        <h2>材料名</h2>
                        <table>

                            <div id="form_area">
                                @foreach($form->materials as $obj)

                                <input type="hidden" name="num_{{$obj->getId()}}" value="{{$obj->getId()}}">
                                <input type="text" name="material_{{$obj->getId()}}" value="{{$obj->getMaterial()}}">

                                <input type="text" name="volume_{{$obj->getId()}}" value="{{$obj->getVolume()}}">
                                <select name="unit_{{$obj->getId()}}" value="{{$obj->getUnit()}}">
                                    <option value="g">g</option>
                                    <option value="個">個</option>
                                    <option value="ml">ml</option>
                                    <option value="適量">適量</option>
                                </select>
                                @endforeach
                            </div>
                            <input id="editInput" type="button" value="+">
                        </table>


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
<script src="{{asset('/js/edit.js')}}"></script>
@endsection
