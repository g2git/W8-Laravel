@extends('layouts.app')

@section('content')
<a href="/titles">@lang('messages.go_back')</a>
          <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

              <!-- Title -->
              <h1 class="mt-4">{{$show_article -> article_title}}</h1>

              <!-- Author -->
              <p class="lead">
                by
                <a href="#">{{$show_article -> user_id}}</a>
              </p>

              <hr>

              <!-- Date/Time & Category -->
              <p>@lang('messages.posted_on') {{$show_article -> created_at}}, @lang('messages.category') : {{$show_article -> category_id}}</p>

              <hr>

              <!-- Preview Image -->
              <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

              <hr>

              <!-- Post Content/Body -->
              <p class="lead">{{$show_article -> article}}</p>

              <form action="#" method="POST">

                  {{ csrf_field() }}

              <div class="rating">

                  <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="5" data-size="xs">

                  <input type="hidden" name="id" required="" value="2">

                  <span class="review-no">422 reviews</span>

                  <br/>

                  <button class="btn btn-success">Submit Review</button>

              </div>
              </form>

              <hr>

              <!-- Comments Form -->
              <div class="card my-4">
                <h5 class="card-header">@lang('messages.leave_comment')</h5>
                <div class="card-body">
                  <form method="post" action="/comment">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="hidden" name="article_id" value="{{$show_article -> id}}">
                      <input type="checkbox" name="anonymous">@lang('messages.anonymous_post')
                      <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submitComment" class="btn btn-primary">@lang('messages.submit')</button>
                  </form>
                </div>
              </div>
              @foreach($comments as $comment)
              <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">{{$comment -> user_id}}</h5>
                     {{$comment -> comment}}
                  </div>
                </div>
                @endforeach
                </div>
              </div>

@endsection

@section('calendar')


<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


@endsection
