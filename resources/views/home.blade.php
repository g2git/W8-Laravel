@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">@lang('messages.success')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @lang('messages.logged_in')
                    <button type="button" href="{{ view('/welcome') }}" name="button">@lang('messages.to_homepage')</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
