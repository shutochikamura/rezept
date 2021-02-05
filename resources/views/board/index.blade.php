@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">

                    <h3 class="card-header">レシピ一覧</h3>

                    <div class="form-group m-2 btn-group">
                        <div class=" nav-item dropdown dropright ">
                            <a href="#" id="stateDropdown" class="nav-link dropdown-toggle h5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                お菓子の種類
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <label class="check-state ml-2" for="state-10"><input id="state-10" class="custom-radio" type="radio" name="stateList" value="10" checked>全て</label>
                                <label class="check-state ml-2" for="state-1"><input id="state-1" class="custom-radio" type="radio" name="stateList" value="1">生菓子</label>
                                <label class="check-state ml-2" for="state-2"><input id="state-2" class="custom-radio" type="radio" name="stateList" value="2">焼き菓子</label>
                                <label class="check-state ml-2" for="state-3"><input id="state-3" class="custom-radio" type="radio" name="stateList" value="3">チョコレート</label>
                                <label class="check-state ml-2" for="state-4"><input id="state-4" class="custom-radio" type="radio" name="stateList" value="4">季節もの</label>
                                <label class="check-state ml-2" for="state-5"><input id="state-5" class="custom-radio" type="radio" name="stateList" value="5">パン</label>
                                <label class="check-state ml-2" for="state-6"><input id="state-6" class="custom-radio" type="radio" name="stateList" value="6">その他</label>
                            </div>

                        </div>



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
                                <div>
                                    <form action="board/{{$item->id}}" method="get">
                                        @csrf

                                        <td><input class="form-control" type="submit" value="{{$item->title}}"></td>
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
