@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <div class="card-header">{{ __('レシピ作成') }}</div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <form action="/board" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <div class="form-group row m-2">
                            <label class="col-md-4 col-form-label text-md-right" for="add-recipe">{{__('菓子名')}}</label>
                            <div class="col-md-6">
                                <input id="add-recipe" class="form-control " type="text" name="title" value="{{old('title')}}">
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label class="col-md-6 offset-md-4 mb-2">{{__('菓子の種類')}}</label>

                            <!-- input-group-text -->
                            <p class="m-2">
                                <div class="form-control-sm btn-group">
                                    <input class="custom-radio" type="radio" name="state" value="1" checked>生菓子
                                    <input class="custom-radio" type="radio" name="state" value="2">焼き菓子
                                    <input class="custom-radio" type="radio" name="state" value="3">チョコレート
                                    <input class="custom-radio" type="radio" name="state" value="4">季節もの
                                    <input class="custom-radio" type="radio" name="state" value="5">パン
                                    <input class="custom-radio" type="radio" name="state" value="6">その他
                                </div>
                            </p>
                        </div>
                        <div class="form-group row ml-2">
                        <label class="col-md-6 offset-md-4 mb-2">{{__('材料名')}}</label>


                        <table>

                                <div class="form-group ">
                                    <tr>
                                        <th>
                                            <input class="form-control" type="text" name="material_0" value="{{old('material')}}">
                                        </th>

                                        <th>
                                            <input class="form-control" type="text" name="volume_0">
                                        </th>

                                        <td>
                                            <select class="custom-select" id="unit" name="unit_0">
                                                <option value="1">g</option>
                                                <option value="2">個</option>
                                                <option value="3">ml</option>
                                                <option value="4">適量</option>
                                            </select>
                                        </td>
                                    </tr>
                                </div>

                            </div>
                        </table>
                        <div id="form_area"></div>
                        <input id="addInput" type="button" value="+">
                        <input type="button" id="deleteInput" value="-" disabled>

                        <div class="form-group row ml-2 ">
                        <div >
                            <h2 >作り方</h2>
                        </div>
                        <textarea class="form-control " name="recipe" id="recipe" cols="30" rows="10">{{old('recipe')}}</textarea>
                        <input type="submit" value="作成">
</div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/add.js')}}"></script>
@endsection
