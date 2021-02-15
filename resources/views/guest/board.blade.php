@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">

                    <h3 class="card-header">{{$host->name}}のレシピ一覧</h3>
                    <div >
                        <form method="post" action="{{ url('guest_search',[],$is_production)}}" class="search_container m-3">
                            @csrf
                            <input id="guestSearch" name="guestSearch" type="text" size="25" placeholder="レシピ内検索">
                            <input type="submit" value="&#xf002">
                        </form>
                    </div>



                    <div class="form-group m-2 btn-group">
                        <div class=" nav-item dropdown dropbottom ">
                            <a href="#" id="stateDropdown" class="nav-link dropdown-toggle h5 dropdown-state" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                お菓子の種類
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-state" aria-labelledby="navbarDropdown">
                                <label class="check-state ml-2" for="state-10"><input id="state-10" type="radio" name="stateList" value="10" checked>全て</label><label class="check-state ml-2" for="state-1"><input id="state-1" type="radio" name="stateList" value="1">生菓子</label>
                                <label class="check-state ml-2" for="state-2"><input id="state-2" type="radio" name="stateList" value="2">焼き菓子</label>
                                <label class="check-state ml-2" for="state-3"><input id="state-3" type="radio" name="stateList" value="3">チョコレート</label><label class="check-state ml-2" for="state-4"><input id="state-4" type="radio" name="stateList" value="4">季節もの</label>
                                <label class="check-state ml-2" for="state-5"><input id="state-5" type="radio" name="stateList" value="5">パン</label>
                                <label class="check-state ml-2" for="state-6"><input id="state-6" type="radio" name="stateList" value="6">その他</label>
                            </div>
                        </div>
                        @can('employee')
                        <div class="form-group">
                            <h4 class="cake-menu mt-1 mr-2">レシピ数{{$items->where('user_id','=', Auth::user()->guest_id)->count()}}</h4>
                            <a class="form-control btn guestCreate" href="{{ url('/guest/create',[],$is_production) }}" value="{{Auth::id()}}">ホストのレシピ作成</a>
                        </div>
                        @endcan

                    </div>
                    <div class="card-body board-frame ">
                        <table class="table board-menu">

                            @foreach($items as $item)
                            @if($item->getData() === Auth::user()->guest_id)
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
                                <div class="board-menu">
                                    <form action={{ url("/guest/{$item->id}",[], $is_production)}} method="get">
                                        @csrf
                                        <input type="hidden" value="{{$item->user_id}}">
                                        <td class="recipe-menu-width recipe-font"><input class="form-control recipe-menu" type="submit" value="{{$item->title}}"></td>
                                    </form>
                                    @can('employee', 'manager')
                                    <form id="/guest/edit/{{$item->id}}" action={{ url("/guest/{$item->id}/edit",[], $is_production) }} method="get">
                                        @csrf
                                        <input type="hidden" value="{{$item->user_id}}">
                                        <th>
                                            <input class="form-control btn-success btn" form="/guest/edit/{{$item->id}}" type="submit" value="編集">
                                        </th>
                                    </form>
                                    @endcan
                                </div>

                            </tr>
                            @endif
                            @endforeach
                        </table>
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
