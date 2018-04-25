@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">@lang('messages.subscribe_with_card')</div>

                <div class="card-body">

                    <form method="POST" action="/subscribe/creditcard">
                        {{ csrf_field() }}    <!--Laravel token check is mandatory for every form in laravel -->

                       <!-- IBAN input -->
                      <div class="form-group{{ $errors->has('creditcard') ? ' has-error' : '' }}">
                        @lang('messages.creditcard')
                        <input type="text" class="form-control" name="creditcard" placeholder="4111 1111 1111 1111">
                        <small class="text-danger">{{ $errors->first('creditcard') }}</small>
                      </div>

                      <!-- Fullname input -->
                      <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        @lang('messages.name_card_holder')
                        <input type="text" class="form-control" name="fullname" placeholder="J.R. Smith">
                        <small class="text-danger">{{ $errors->first('fullname') }}</small>
                      </div>

                      <input class="btn btn-success pull-right" type="submit" name="submitSubscribe" value="@lang('messages.subscribe')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
