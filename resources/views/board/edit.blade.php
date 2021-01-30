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



                        <input type="radio" name="state" value="1" @if($form->state === 1) checked @endif >生菓子
                        <input type="radio" name="state" value="2" @if($form->state === 2) checked @endif >焼き菓子
                        <input type="radio" name="state" value="3" @if($form->state === 3) checked @endif >チョコレート
                        <input type="radio" name="state" value="4" @if($form->state === 4) checked @endif >季節もの
                        <input type="radio" name="state" value="5" @if($form->state === 5) checked @endif >パン
                        <input type="radio" name="state" value="6" @if($form->state === 6) checked @endif >その他
                        <h2>材料名</h2>

                        <div  id="form_area">

                            @foreach($form->materials as $obj)
                            <table class="input-wrapper">
                                    <tr>
                                    <input type="hidden" name="num_{{$obj->getId()}}" value="{{$obj->getId()}}">
                                    <th>
                                        <input type="text" name="material_{{$obj->getId()}}" value="{{$obj->getMaterial()}}">
                                    </th>

                                    <th>
                                        <input type="text" name="volume_{{$obj->getId()}}" value="{{$obj->getVolume()}}">
                                    </th>
                                    <td>
                                        <select name="unit_{{$obj->getId()}}" value="{{$obj->getUnit()}}">
                                            <option value="1" @if($obj->getUnit() === '1') selected @endif >g</option>
                                            <option value="2" @if($obj->getUnit() === '2') selected @endif >個</option>
                                            <option value="3" @if($obj->getUnit() === '3') selected @endif >ml</option>
                                            <option value="4" @if($obj->getUnit() === '4') selected @endif >適量</option>

                                        </select>
                                        {{$obj->state}}
                                    </td>
                                </tr>
                            </table>
                                    @endforeach
                            </div>
                            <div></div>
                            <input id="editInput" type="button" value="+">
                            <input type="button" id="deleteInput" value="-" disabled>
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
