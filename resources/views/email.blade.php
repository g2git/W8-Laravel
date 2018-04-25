@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">@lang('messages.send_email')</div>

            <div class="card-body">

                <form method="POST" action="/sendemail">
                    {{ csrf_field() }}    <!--Laravel token check is mandatory for every form in laravel -->

                   <!-- Title of group-email input -->
                  <div class="form-group{{ $errors->has('email_title') ? ' has-error' : '' }}">
                    @lang('messages.email_title')
                    <input type="text" class="form-control" name="email_title" placeholder="@lang('messages.type_title')">
                    <small class="text-danger">{{ $errors->first('email_title') }}</small>
                  </div>

                  <!-- Body of email input -->
                  <div class="form-group{{ $errors->has('article_body') ? ' has-error' : '' }}">
                    <textarea class="form-control" name="article_body" placeholder="@lang('messages.type_article')" rows="7" ></textarea>
                    <small class="text-danger">{{ $errors->first('article_body') }}</small>
                  </div>

                  <!-- Fullname input -->
                  <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    @lang('messages.name_account_holder')
                    <input type="text" class="form-control" name="fullname" placeholder="J.R. Smith">
                    <small class="text-danger">{{ $errors->first('fullname') }}</small>
                  </div>

                  <input class="btn btn-success pull-right" type="submit" name="submitSubscribe" value="@lang('messages.subscribe')!">
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
