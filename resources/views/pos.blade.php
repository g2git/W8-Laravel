@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">


                <div class="panel-body">

                    <form action="#" method="POST">

                        {{ csrf_field() }}

                    <div class="card">

                        <div class="container-fliud">

                            <div class="wrapper row">

                                <div class="preview col-md-6">



                                    <div class="preview-pic tab-content">

                                      <div class="tab-pane active" id="pic-1"><img src="https://dummyimage.com/500x450/000/fff" /></div>

                                    </div>


                                </div>

                                <div class="details col-md-6">

                                    <h3 class="product-title">Laravel 5.5 Ratting System</h3>

                                    <div class="rating">

                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="5" data-size="xs">

                                        <input type="hidden" name="id" required="" value="2">

                                        <span class="review-no">422 reviews</span>

                                        <br/>

                                        <button class="btn btn-success">Submit Review</button>

                                    </div>

                                    <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>

                                    <h4 class="price">current price: <span>$180</span></h4>

                                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>

                                    <h5 class="sizes">sizes:

                                        <span class="size" data-toggle="tooltip" title="small">s</span>

                                        <span class="size" data-toggle="tooltip" title="medium">m</span>

                                        <span class="size" data-toggle="tooltip" title="large">l</span>

                                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>

                                    </h5>

                                    <h5 class="colors">colors:

                                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>

                                        <span class="color green"></span>

                                        <span class="color blue"></span>

                                    </h5>

                                    <div class="action">

                                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>

                                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">

    $("#input-id").rating();

</script>

@endsection
