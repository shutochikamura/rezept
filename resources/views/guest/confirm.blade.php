@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('確認画面') }}</div>

                <div class="card-body">

                    {{ __('ホスト名を確認して下さい') }}
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <h4>-- {{$user->name}} --</h4>
                    </div>
                </div>
                <form action="guest" method="get">
                    @csrf
                    <div class="form-group row mt-4 mb-4">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('レシピ編集、閲覧') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
