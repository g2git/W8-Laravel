@extends('layouts.app')

@section('content')

<div id="blog" class="row">
  <div class="form-group col-md-2">
    <form method = "POST" action="/titles">
      {{csrf_field()}}
      <select class="form-control" name="filterbyCategory" required>
        <option value="" selected disabled>@lang('messages.choose_category')</option>
        @foreach($items as $item)
         <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
      <button type = "submit" name = "filterCategory">@lang('messages.filter')</button>
    </form>
    <!-- <div class="form-group"> -->
     <form method = "POST" action="/titles">
       {{csrf_field()}}
       <input type="text" name="filterbyAuthor" placeholder= "@lang('messages.choose_author')">
       <button type = "submit" name = "filterAuthor">@lang('messages.filter')</button>
      </form>
   <!-- </div> -->

  </div>
  <div class="col-md-10 blogShort" style="float:right">
    @foreach ($titles as $title)

                    <h1><a href="/titles/{{$title->id}}">{{$title -> user_id}}: {{$title -> article_title}}</a></h1>
                    <img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">

                    <a class="btn btn-blog pull-right marginBottom10" href="/titles/{{$title->id}}">@lang('messages.read_more')</a>
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="4" data-size="xs" disabled="">

      @endforeach
      </div>
      <div class="col-md-12 gap10">
         <a href="{{URL::previous()}}">@lang('messages.go_back')</a>
      </div>
      </div>
@endsection

@section('calendar')


<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


@endsection
