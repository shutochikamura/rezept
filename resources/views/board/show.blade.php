
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
        <tr><th>{{$items->material}}</th></tr>
        </table>
        <table>
        <tr><th>{{$items->recipe}}</th></tr>
        </table>

</div>


            </div>
        </div>
    </div>
</div>
@endsection
