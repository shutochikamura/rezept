@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('ホーム') }}</div>


                <form action="/image" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" >
                <input type="submit">
            </form>


            </div>
        </div>
    </div>
</div>

@endsection
