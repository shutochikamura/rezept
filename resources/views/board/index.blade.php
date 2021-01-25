@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3>text</h3>
                @foreach($items as $item)
                <div class="card-body board-frame">


                    <form action="board/{{$item->id}}" method="get">
                        <table>
                            @csrf
                            <tr>

                                <td><input type="submit" value="{{$item->title}}"></td>
                    </form>
                    <form id="edit/{{$item->id}}" action="/board/{{$item->id}}/edit" method="get">
                        @csrf
                        <th>
                            <input form="edit/{{$item->id}}" type="submit" value="編集">
                        </th>
                    </form>

                    </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
