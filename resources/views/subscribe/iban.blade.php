@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">@lang('messages.subscribe_iban')</div>

                <div class="card-body">

                    <form method="POST" action="/subscribe/iban">
                        {{ csrf_field() }}    <!--Laravel token check is mandatory for every form in laravel -->

                       <!-- IBAN input -->
                      <div class="form-group{{ $errors->has('iban') ? ' has-error' : '' }}">
                        IBAN
                        <input type="text" class="form-control" name="iban" placeholder="NL91ABNA0417164300">
                        <small class="text-danger">{{ $errors->first('iban') }}</small>
                      </div>

                      <!-- Fullname input -->
                      <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        @lang('messages.name_account_holder')
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
