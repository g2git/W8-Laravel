@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">@lang('messages.payment_method')</div>

                <div class="card-body">

                    <form method="POST" action="/subscribe/index">
                        {{ csrf_field() }}    <!--Laravel token check is mandatory for every form in laravel -->


                      <!-- Membership-plan input -->
                      <div class="form-group">
                        @lang('messages.one_time_fee')
                      <input type="radio" name="membershiplan" value="iban" checked>
                      </div>

                       <!-- IBAN input -->
                      <div class="form-group">
                        IBAN
                        <input type="radio" name="paymentCheck" value="iban">
                      </div>

                      <!-- CreditCard input -->
                      <div class="form-group">
                         @lang('messages.creditcard')
                         <input type="radio" name="paymentCheck" value="creditcard">
                      </div>

                      <input class="btn btn-success pull-right" type="submit" name="submitSubscribe" value="@lang('messages.subscribe')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
