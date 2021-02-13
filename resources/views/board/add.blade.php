@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">{{ __('レシピ作成') }}</h3>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif


                        <form action="{{url('/board', $is_production)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <label form="add-recipe">
                                    <h3>菓子名</h3>
                                </label>

                                <input id="add-recipe" class="form-control" type="text" name="title" value="{{old('title')}}">
                            </div>

                            <h3>菓子の種類</h3>


                            <!-- input-group-text -->
                            <label for="add-state-1"><input id="add-state-1" class="custom-radio" type="radio" name="state" value="1" checked>生菓子</label>
                            <label for="add-state-2"><input id="add-state-2" class="custom-radio" type="radio" name="state" value="2">焼き菓子</label>
                            <label for="add-state-3"><input id="add-state-3" class="custom-radio" type="radio" name="state" value="3">チョコレート</label>
                            <label for="add-state-4"><input id="add-state-4" class="custom-radio" type="radio" name="state" value="4">季節もの</label>
                            <label for="add-state-5"><input id="add-state-5" class="custom-radio" type="radio" name="state" value="5">パン</label>
                            <label for="add-state-6"><input id="add-state-6" class="custom-radio" type="radio" name="state" value="6">その他</label>



                            <h2>材料名</h2>
                            <div class="form-group material-box ">
                                <input class="material-input" type="text" name="material_0">

                                <input class="volume-input" type="text" name="volume_0">

                                <select class="unit-select" id="unit" name="unit_0">
                                    <option value="1">g</option>
                                    <option value="2">個</option>
                                    <option value="3">ml</option>
                                    <option value="4">適量</option>
                                </select>

                                <div id="form_area"></div>
                            </div>


                            <input class="form-plus" id="addInput" type="button" value="+">
                            <input class="form-plus" type="button" id="deleteInput" value="-" disabled>


                            <h2>作り方</h2>

                            <textarea class="form-control mb-4" name="recipe" id="recipe" cols="30" rows="10">{{old('recipe')}}</textarea>
                            <!-- <div id="attachment">
                                こちらの方がかっこいいけどJQueryのため保留
                                <label><input type="file" name="file" class="fileinput">写真を添付する</label>
                                <div id="img-input" class="filename"></div>
                            </div> -->
                            <label class="h4" for="photo">画像ファイル</label>
                            <input type="file" class="form-control img-input" name="file">

                            <div class="edit-form">
                                <input class="form-control-sm btn-success edit-input btn" type="submit" value="作成">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/add.js')}}"></script>
@endsection
