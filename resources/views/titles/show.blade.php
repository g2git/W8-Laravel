<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115158812-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115158812-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
</head>
<body>

    <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXX"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="dropdown"><a href="#" class="nav-link" data-toggle="dropdown">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>

                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">@lang('messages.login')</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">@lang('messages.register')</a></li>

                        @else
                            <li><a class="nav-link" href="{{ route('events.index') }}">@lang('messages.events')</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('messages.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">

            <a href="/titles">@lang('messages.go_back')</a>
                      <div class="row">

                        <!-- Post Content Column -->
                        <div class="col-lg-8">

                          <!-- Title -->
                          <h1 class="mt-4">{{$show_article -> article_title}}</h1>

                          <!-- Author -->
                          <p class="lead">
                            by
                            <a href="#">{{$show_article -> user->name}}</a>
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

                          <form method="POST" action="/vote">

                              {{ csrf_field() }}

                          <div class="rating">

                              <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">

                              <input type="hidden" name="id" required="" value="{{ $post->id }}">

                              <br/>

                              <button class="btn btn-success">@lang('messages.submit_rating')</button>

                          </div>
                          </form>

                          @if (session()->has('data'))
                          <div class="alert alert-success">{{session('data')}}</div>
                          @endif

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
                              <h5 class="mt-0">{{$comment -> user ->name}}: {{$comment -> comment}}</h5>
                              </div>
                            </div>
                            @endforeach
                            </div>
                          </div>

          </div>
        </main>
    </div>

    <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

</body>
</html>
