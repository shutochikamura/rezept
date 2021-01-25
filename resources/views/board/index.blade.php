
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

@foreach($items as $item)
<div class="card-body board-frame">


        <table>


                @csrf
                <tr>
                    <th>{{$item->name}}</th>

<h3>textSample</h3>



            </tr>
        </table>

</div>
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection
