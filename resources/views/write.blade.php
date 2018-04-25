@extends('layouts.app')

@section('content')
<a href="{{URL::previous()}}">@lang('messages.go_back')</a>

    <div class="col-md-5">
        <div class="form-area">
            <form method="post" action="/posts">
              {{ csrf_field() }}    <!--Laravel token check is mandatory for every form in laravel -->

            <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;">@lang('messages.post_article')</h3>

               <!--Article Title  -->

                <div class="form-group{{ $errors->has('article_title') ? ' has-error' : '' }}">
    						<input type="text" class="form-control" name="article_title" placeholder= "@lang('messages.type_title')" >
                <small class="text-danger">{{ $errors->first('article_title') }}</small>
    					</div>

                <!--Category dropdown from database  -->

              <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <select class="form-control" name="category_id">
                  <option value="" selected disabled>@lang('messages.choose_category')</option>
                  @foreach($items as $item)
                   <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                <small class="text-danger">{{ $errors->first('category_id') }}</small>
              </div>

              <!-- Article body -->

               <div class="form-group{{ $errors->has('article_body') ? ' has-error' : '' }}">
                  <textarea class="form-control" name="article_body" placeholder="@lang('messages.type_article')" rows="7" ></textarea>
                  <small class="text-danger">{{ $errors->first('article_body') }}</small>
               </div>

            <input class="btn btn-success pull-right" type="submit" name="submitArticle" value="@lang('messages.post')">
            </form>
        </div>
    </div>
@endsection
