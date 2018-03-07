@extends('layouts.app')

@section('calendar')

<main class="py-4">
  <div class="container">
    <a href="{{URL::previous()}}">@lang('messages.go_back')</a>

      <div class="panel-heading"><h1> @lang('messages.calendar') </h1></div>
            <div class="panel panel-primary">
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
