@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">レシピ一覧</h3>
                    <div style="width:100%;">
                        <form method="post" action="{{ url('board_search',[], $is_production) }}" class="search_container m-3">
                            @csrf
                            <input id="hostSearch" name="hostSearch" type="text" size="25" placeholder="レシピ内検索">
                            <input type="submit" value="&#xf002">
                        </form>
                    </div>
                    <div class="form-group m-2 btn-group">
                        <div class=" nav-   item dropdown dropbottom ">
                            <a href="#" id="stateDropdown" class="nav-link dropdown-toggle h5 dropdown-state" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                お菓子の種類
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-state" aria-labelledby="navbarDropdown">
                                <label class="check-state ml-2" for="state-10"><input id="state-10" class="custom-radio" type="radio" name="stateList" value="10" checked>全て</label>
                                <label class="check-state ml-2" for="state-1"><input id="state-1" class="custom-radio" type="radio" name="stateList" value="1">生菓子</label>
                                <label class="check-state ml-2" for="state-2"><input id="state-2" class="custom-radio" type="radio" name="stateList" value="2">焼き菓子</label>
                                <label class="check-state ml-2" for="state-3"><input id="state-3" class="custom-radio" type="radio" name="stateList" value="3">チョコレート</label>
                                <label class="check-state ml-2" for="state-4"><input id="state-4" class="custom-radio" type="radio" name="stateList" value="4">季節もの</label>
                                <label class="check-state ml-2" for="state-5"><input id="state-5" class="custom-radio" type="radio" name="stateList" value="5">パン</label>
                                <label class="check-state ml-2" for="state-6"><input id="state-6" class="custom-radio" type="radio" name="stateList" value="6">その他</label>
                            </div>
                        </div>
                        <h4 class="cake-menu mt-1">レシピ{{$items->firstItem()}}~{{$items->lastItem()}}
                        </h4>
                    </div>
                    <div class="board-frame card-body table board-menu m-1 mb-2">
                        @foreach($items as $item)
                        @if($item->getData() === Auth::id())
                        <div class="f-item recipeCard mt-2" @if($item->imagePath() != null)
                            style="background-image:url({{$item->imagePath()}});"
                            @endif>
                            @if($item->state === 1)
                            <div class="mouse">
                                @elseif($item->state === 2)
                                <div class="cookie">
                                    @elseif($item->state === 3)
                                    <div class="choco">
                                        @elseif($item->state === 4)
                                        <div class="season">
                                            @elseif($item->state === 5)
                                            <div class="pan">
                                                @elseif($item->state === 6)
                                                <div class="el">
                                                    @endif
                                                </div>
                                                <div class="board-flex-menu">
                                                    <form action={{ url("/board/{$item->id}",[], $is_production) }} method="get">
                                                        @csrf
                                                        <div class="recipe-menu-width recipe-font">
                                                            <input class="recipe-menu form-control" type="submit" value="{{$item->title}}">
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            {{ $items->links('vendor.pagination.bootstrap-4') }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="{{mix('/js/recipe.js')}}"></script>
                    @endsection
