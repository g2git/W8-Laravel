  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">@lang('messages.test_query')</div>

                <div class="card-body">

                    <form method="POST" action="/querytest/index">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="Query" class="col-sm-4 col-form-label text-md-right">@lang('messages.insert_query')</label>

                            <div class="col-md-6">
                                <input id="query" type="text" class="form-control{{ $errors->has('query') ? ' is-invalid' : '' }}" name="query" autofocus>

                                @if ($errors->has('query'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('query') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('messages.submit')
                                </button>
                            </div>
                        </div>

                              @if(isset($result))
                                  <div class="alert alert-success">{{$result}}</div>
                              @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
