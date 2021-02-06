@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">ホストのレシピ編集</h3>
                    <div class="card-body board-frame">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        @can('employee')
                        <form action="/guest/{{$form->id}}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{Auth::user()->guest_id}}">
                                <label for="edit-title">
                                    <h2>菓子名</h2>
                                </label>

                                <input id="edit-title" class="form-control" type="text" name="title" value="{{$form->title}}">
                            </div>

                            <h2>菓子の種類</h2>

                            <label for="edit-state-1"><input id="edit-state-1" type="radio" name="state" value="1" @if($form->state === 1) checked @endif >生菓子</label>
                            <label for="edit-state-2"><input id="edit-state-2" type="radio" name="state" value="2" @if($form->state === 2) checked @endif >焼き菓子</label>
                            <label for="edit-state-3"><input id="edit-state-3" type="radio" name="state" value="3" @if($form->state === 3) checked @endif >チョコレート</label>
                            <label for="edit-state-4"><input id="edit-state-4" type="radio" name="state" value="4" @if($form->state === 4) checked @endif >季節もの</label>
                            <label for="edit-state-5"><input id="edit-state-5" type="radio" name="state" value="5" @if($form->state === 5) checked @endif >パン</label>
                            <label for="edit-state-6"><input id="edit-state-6" type="radio" name="state" value="6" @if($form->state === 6) checked @endif >その他</label>
                            <h2>材料名</h2>



                                <div class="form-group material-box">
                                    @foreach($form->materials as $obj)

                                    <input type="hidden" name="num_{{$obj->getId()}}" value="{{$obj->getId()}}">

                                    <input class="material-input" type="text" name="material_{{$obj->getId()}}" value="{{$obj->getMaterial()}}">

                                    <input class="volume-input" type="text" name="volume_{{$obj->getId()}}" value="{{$obj->getVolume()}}">

                                    <select class="unit-select" name="unit_{{$obj->getId()}}" value="{{$obj->getUnit()}}">
                                        <option value="1" @if($obj->getUnit() === '1') selected @endif >g</option>
                                        <option value="2" @if($obj->getUnit() === '2') selected @endif >個</option>
                                        <option value="3" @if($obj->getUnit() === '3') selected @endif >ml</option>
                                        <option value="4" @if($obj->getUnit() === '4') selected @endif >適量</option>
                                        <option value="0">削除する</option>

                                    </select>

                                    @endforeach

                                    <div id="form_area"></div>
                                </div>
                            <input class="form-plus" id="editInput" type="button" value="+">
                            <input class="form-plus" type="button" id="deleteInput" value="-" disabled>
                            <h2>作り方</h2>
                            <textarea class="form-control mb-4" name="recipe" id="recipe" cols="30" rows="10">{{$form->recipe}}</textarea>
                            <input class="form-control-sm btn-success edit-input btn" type="submit" value="変更">
                        </form>
                        @endcan

                    </div>


                </div>


            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/edit.js')}}"></script>
@endsection
