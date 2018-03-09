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

            <div id="blog" class="row">
              <div class="form-group col-md-2">
                <form method = "POST" action="/titles">
                  {{csrf_field()}}
                  <select  name="filterbyCategory" required>
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
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $posts[$title->id-1]->averageRating }}" data-size="xs" disabled="">

                  @endforeach
                  </div>
                  <div class="col-md-12 gap10">
                     <a href="{{URL::previous()}}">@lang('messages.go_back')</a>
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
