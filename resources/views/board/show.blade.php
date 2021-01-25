
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<h3>test</h3>
@foreach($items as $item)
<div class="card-body board-frame">


        <table>


                @csrf
                <tr>
                    <th>{{$item->title}}</th>
            </tr>
        </table>
        <table>
        <tr><th>{{$item->material}}</th></tr>
        </table>
        <table>
        <tr><th>{{$item->recipe}}</th></tr>
        </table>

</div>
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection
