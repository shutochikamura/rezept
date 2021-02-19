@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">レシピ詳細</h3>


                    <div class="card-body">

                        <h4 class="cake-menu">
                            {{$items->title}}
                        </h4>

                        <div class="h5 cake-menu">
                            @if($items->state === 1)
                            生菓子
                            @elseif($items->state === 2)
                            焼き菓子
                            @elseif($items->state === 3)
                            チョコレート
                            @elseif($items->state === 4)
                            季節もの
                            @elseif($items->state === 5)
                            パン
                            @elseif($items->state === 6)
                            その他
                            @else
                            その他
                            @endif
                        </div>


                        <div class="cake-menu h5">分量</div>
                        @if($items->materials != null)
                        <ul class="material-ul">
                            @foreach($items->materials as $obj)
                            <li class="cake-menu material-list mt-1">
                                <div class="material-show">
                                    {{$obj->getMaterial()}}
                                </div>
                                <div class="volume-show">
                                    {{$obj->getVolume()}}
                                    @if($obj->getUnit() === '1')
                                    g
                                    @elseif($obj->getUnit() === '2')
                                    個
                                    @elseif($obj->getUnit() === '3')
                                    ml
                                    @elseif($obj->getUnit() === '4')
                                    適量
                                    @endif
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        @endif

                        <div class="cake-menu  h5 mt-5">作り方</div>

                        <textarea class="recipe-textarea form-control mb-4 bg-white" name="" id="" cols="30" rows="10" readonly>{{$items->recipe}}</textarea>


                        <img class="img-size" src="{{ $user_image['path'] }}">

                        <form id="edit/{{$items->id}}" action={{ url("/board/{$items->id}/edit",[],$is_production) }} method="get">
                            @csrf
                            <input class="form-control btn-success btn edit-border mt-2" form="edit/{{$items->id}}" type="submit" value="編集">
                        </form>

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
