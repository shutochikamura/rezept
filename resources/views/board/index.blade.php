@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <td><h3>レシピ一覧</h3></td>
            <tr>
                <th><input type="radio" name="stateList" value="10" checked>全て</th>
                <th><input type="radio" name="stateList" value="1">生菓子</th>
                <th><input type="radio" name="stateList" value="2">焼き菓子</th>
                <th><input type="radio" name="stateList" value="3">チョコレート</th>
                <th><input type="radio" name="stateList" value="4">季節もの</th>
                <th><input type="radio" name="stateList" value="5">パン</th>
                <th><input type="radio" name="stateList" value="6">その他</th>
            </tr>
                @foreach($items as $item)
                <div class="card-body board-frame ">
<input class="oneState" type="hidden" value="{{$item->state}}">

                    <form action="board/{{$item->id}}" method="get">
                        <table class="recipeCard">
                            @csrf
                            <tr>

                                <td><input type="submit" value="{{$item->title}}"></td>
                    </form>
                    <form id="edit/{{$item->id}}" action="/board/{{$item->id}}/edit" method="get">
                        @csrf
                        <th>
                            <input form="edit/{{$item->id}}" type="submit" value="編集">
                        </th>
                    </form>

                    </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<script src="{{mix('/js/recipe.js')}}"></script>
@endsection
