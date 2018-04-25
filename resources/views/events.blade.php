@extends('layouts.app')

@section('calendar')

<main class="py-4">
  <div class="container">
    <a href="{{URL::previous()}}">@lang('messages.go_back')</a>
    <div class="panel panel-primary">

             <div class="panel-heading"><h1> @lang('messages.events') </h1></div>

              <div class="panel-body">

                   {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('event_name',__('messages.event_name')) !!}
                            <div class="">
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          {!! Form::label('start_date',__('messages.start_date')) !!}
                          <div class="">
                          {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          {!! Form::label('end_date',__('messages.end_date')) !!}
                          <div class="">
                          {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!! Form::submit(__('messages.add_event'),['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                   {!! Form::close() !!}

             </div>

            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">@lang('messages.event_details')</div>
              <div class="panel-body" >
                  {!! $calendar_details->calendar() !!}
              </div>
            </div>

            </div>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


  <!-- Scripts -->
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>



      <div id="calendar"></div>

  {!! $calendar_details->script() !!}

    </div>

  </div>
</main>
@endsection
