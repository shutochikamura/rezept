
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<h3>text</h3>
@foreach($items as $item)
<div class="card-body board-frame">


        <form action="{{$item->id}}" method="get">
            <table>
                    @csrf
                    <tr>
                        <th>{{$item->title}}</th>
                        <td><input type="submit" value="send"></td>
                </tr>
            </table>
        </form>


</div>
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection
