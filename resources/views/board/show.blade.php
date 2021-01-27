
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<h3>test</h3>


<div class="card-body board-frame">


        <table>


                <tr>
                    <th>{{$items->title}}</th>
            </tr>
        </table>
        <table>

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
        </table>

        @if($items->materials != null)
        @foreach($items->materials as $obj)
        <table><tr><th>{{$obj->getData()}}</th></tr></table>
        @endforeach
        @endif
        <table>
        <tr><th>{{$items->recipe}}</th></tr>
        </table>

</div>


            </div>
        </div>
    </div>
</div>
@endsection
