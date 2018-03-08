@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">Posts</div>


                <div class="panel-body">


                    <table class="table table-bordered">

                        <tr>

                            <th>Id</th>

                            <th>Name</th>

                            <th width="400px">Star</th>

                            <th width="100px">View</th>

                        </tr>

                        @if($posts->count())

                            @foreach($posts as $post)

                            <tr>

                                <td>{{ $post->id }}</td>

                                <td>{{ $post->name }}</td>

                                <td>

                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $post->averageRating }}" data-size="xs" disabled="">

                                </td>

                                <td>

                                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary btn-sm">View</a>

                                </td>

                            </tr>

                            @endforeach

                        @endif

                    </table>


                </div>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">

    $("#input-id").rating();

</script>

@endsection
