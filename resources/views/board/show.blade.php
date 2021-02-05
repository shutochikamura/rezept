@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card">
                    <h3 class="card-header">レシピ詳細</h3>


                    <div class="card-body">


                        <table>
                            <tr>
                                <th>{{$items->title}}</th>
                            </tr>
                            <tr>
                                @if($items->state === 1)
                                <th>生菓子</th>
                                @elseif($items->state === 2)
                                <th>焼き菓子</th>
                                @elseif($items->state === 3)
                                <th>チョコレート</th>
                                @elseif($items->state === 4)
                                <th>季節もの</th>
                                @elseif($items->state === 5)
                                <th>パン</th>
                                @elseif($items->state === 6)
                                <th>その他</th>
                                @else
                                <th>その他</th>
                                @endif
                            </tr>


                            @if($items->materials != null)
                            @foreach($items->materials as $obj)
                            <tr>
                                <th>{{$obj->getData()}}

                                    @if($obj->getUnit() === '1')
                                    g
                                    @elseif($obj->getUnit() === '2')
                                    個
                                    @elseif($obj->getUnit() === '3')
                                    ml
                                    @elseif($obj->getUnit() === '4')
                                    適量
                                    @endif
                                    </th>
                            </tr>
                            @endforeach
                            @endif

                            <tr>
                            <th>
                            {{$items->recipe}}

                            </th>
                            </tr>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
