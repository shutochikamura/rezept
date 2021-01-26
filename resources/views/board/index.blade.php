@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <td>
                    <h3>レシピ一覧</h3>
                </td>
                <tr>
                    <th><input type="radio" name="stateList" value="10" checked>全て</th>
                    <th><input type="radio" name="stateList" value="1">生菓子</th>
                    <th><input type="radio" name="stateList" value="2">焼き菓子</th>
                    <th><input type="radio" name="stateList" value="3">チョコレート</th>
                    <th><input type="radio" name="stateList" value="4">季節もの</th>
                    <th><input type="radio" name="stateList" value="5">パン</th>
                    <th><input type="radio" name="stateList" value="6">その他</th>
                </tr>
                <p id="recipeCount"></p>
                <div class="card-body board-frame ">
                    <table>
                @foreach($items as $item)
                        <tr class="recipeCard">
                            @if($item->state === 1)
                            <th class="mouse">
                                @elseif($item->state === 2)
                            <th class="cookie">
                                @elseif($item->state === 3)
                            <th class="choco">
                                @elseif($item->state === 4)
                            <th class="season">
                                @elseif($item->state === 5)
                            <th class="pan">
                                @elseif($item->state === 6)
                            <th class="el">
                                @endif
                            </th>
                            <form action="board/{{$item->id}}" method="get">
                                @csrf

                                <td><input type="submit" value="{{$item->title}}"></td>
                            </form>
                            <form id="edit/{{$item->id}}" action="/board/{{$item->id}}/edit" method="get">
                                @csrf
                                <th>
                                    <input form="edit/{{$item->id}}" type="submit" value="編集">
                                </th>
                            </form>

                        </tr>
                @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{mix('/js/recipe.js')}}"></script>
@endsection
