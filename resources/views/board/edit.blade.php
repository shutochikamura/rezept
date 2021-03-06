@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">レシピ編集</h3>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form id="edit-host-input" action={{ url("/board/{$form->id}",[], $is_production) }} method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <label for="edit-title">
                                    <h3>菓子名</h3>
                                </label>

                                <input id="edit-title" class="form-control" type="text" name="title" value="{{$form->title}}">
                            </div>
                            <h3>菓子の種類</h3>

                            <label for="edit-state-1"><input id="edit-state-1" type="radio" name="state" value="1" @if($form->state === 1) checked @endif >生菓子</label>
                            <label for="edit-state-2"><input id="edit-state-2" type="radio" name="state" value="2" @if($form->state === 2) checked @endif >焼き菓子</label>
                            <label for="edit-state-3"><input id="edit-state-3" type="radio" name="state" value="3" @if($form->state === 3) checked @endif >チョコレート</label>
                            <label for="edit-state-4"><input id="edit-state-4" type="radio" name="state" value="4" @if($form->state === 4) checked @endif >季節もの</label>
                            <label for="edit-state-5"><input id="edit-state-5" type="radio" name="state" value="5" @if($form->state === 5) checked @endif >パン</label>
                            <label for="edit-state-6"><input id="edit-state-6" type="radio" name="state" value="6" @if($form->state === 6) checked @endif >その他</label>
                            <h3>材料名</h3>

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
                                    <option value="0">列を削除</option>

                                </select>


                                @endforeach
                                <div id="form_area"></div>
                            </div>
                            <input class="form-plus" id="editInput" type="button" value="+">
                            <input class="form-plus " type="button" id="deleteInput" value="-" disabled>
                            <h3>作り方</h3>
                            <textarea class="form-control mb-4" name="recipe" id="recipe" cols="30" rows="10">{{$form->recipe}}</textarea>

                            @if($user_image != null)

                            <img class="img-size" src="{{ $user_image['path'] }}">

                            <div id="img_area"></div>
                            <select class="img-select" name="image" id="img-select">
                                <option value="0">写真そのまま</option>
                                <option value="1">写真を変更</option>
                                <option value="2">写真を削除</option>
                            </select>
                            @elseif ($user_image == null)
                            <div id="img_area"></div>
                            <select class="img-select" name="image" id="img-select">
                                <option value="0">写真追加しない</option>
                                <option value="3">写真追加</option>
                            </select>
                            @endif

                        </form>

                        <table class="edit-form">
                            <input form="edit-host-input" class="form-control-sm btn-success edit-input btn" type="submit" value="変更">
                            <form action={{ url("/board/{$form->id}",[],$is_production)}} method="post">
                                @csrf
                                @method('delete')
                                <input class="btn form-control-sm btn-danger delete-input" type="submit" value="削除する" onClick="delete_alert(event);return false;">
                            </form>
                        </table>



                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/edit.js',$is_production)}}"></script>
@endsection
