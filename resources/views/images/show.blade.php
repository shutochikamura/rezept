@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('ホーム') }}</div>
                @foreach ($user_images as $user_image)
                    <img src="{{$user_image['path']}}" alt="">
                @endforeach


            </div>
        </div>
    </div>
</div>

@endsection
