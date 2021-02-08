@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">ホストのレシピ作成</h3>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        @can('employee')
                        <form action="/guest" method="post">
                            @csrf

                            <input type="hidden" name="user_id" value="{{Auth::user()->guest_id}}">
                            <div class="form-group">
                                <label for="add-recipe"><h2>菓子名</h2></label>
                                <input id="add-recipe" class="form-control" type="text" name="title" value="{{old('title')}}">
                            </div>

                            <h2>菓子の種類</h2>

                            <label for="add-state-1"><input id="add-state-1" class="custom-radio" type="radio" name="state" value="1" checked>生菓子</label>
                            <label for="add-state-2"><input id="add-state-2" class="custom-radio" type="radio" name="state" value="2">焼き菓子</label>
                            <label for="add-state-3"><input id="add-state-3" class="custom-radio" type="radio" name="state" value="3">チョコレート</label>
                            <label for="add-state-4"><input id="add-state-4" class="custom-radio" type="radio" name="state" value="4">季節もの</label>
                            <label for="add-state-5"><input id="add-state-5" class="custom-radio" type="radio" name="state" value="5">パン</label>
                            <label for="add-state-6"><input id="add-state-6" class="custom-radio" type="radio" name="state" value="6">その他</label>

                            <h2>材料名</h2>

                                <div class="form-group material-box">
                                            <input class="material-input"  type="text" name="material_0" value="{{old('material')}}">

                                            <input class="volume-input"  type="text" name="volume_0">

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
                            <input class="form-control-sm btn-success edit-input btn" type="submit" value="作成">
                        </form>
                        @endcan
                    </div>
                    </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/add.js')}}"></script>
@endsection
