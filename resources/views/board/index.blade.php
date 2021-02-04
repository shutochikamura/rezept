@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <td>
                        <h3 class="card-header">レシピ一覧</h3>
                    </td>
                    <div class="form-group row m-2">
                    <tr >
                        <th><input  type="radio" name="stateList" value="10" checked>全て</th>
                        <th><input type="radio" name="stateList" value="1">生菓子</th>
                        <th><input type="radio" name="stateList" value="2">焼き菓子</th>
                        <th><input type="radio" name="stateList" value="3">チョコレート</th>
                        <th><input type="radio" name="stateList" value="4">季節もの</th>
                        <th><input type="radio" name="stateList" value="5">パン</th>
                        <th><input type="radio" name="stateList" value="6">その他</th>
                    </tr>
</div>
                    <div class="card-body board-frame ">
                        <table class="table ">
                    @foreach($items as $item)
                    @if($item->getData() === Auth::id())
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
                                <div >
                                    <form action="board/{{$item->id}}" method="get">
                                        @csrf

                                        <td ><input class="form-control" type="submit" value="{{$item->title}}"></td>
                                    </form>
                                    <form id="edit/{{$item->id}}" action="/board/{{$item->id}}/edit" method="get">
                                        @csrf
                                        <th>
                                        <!-- was-validated is-valid -->
                                            <input class="form-control btn-success" form="edit/{{$item->id}}" type="submit" value="編集">
                                        </th>
                                    </form>
                                </div>

                            </tr>
                            @endif
                    @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{mix('/js/recipe.js')}}"></script>
@endsection
