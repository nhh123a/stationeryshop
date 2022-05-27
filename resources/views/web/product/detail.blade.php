@extends('web.main')

@section('content')
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Single Page
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">

                    <div class="clearfix"></div>
                <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1000%; transition-duration: 0s; transform: translate3d(-437px, 0px, 0px);"><li data-thumb="images/si3.jpg" class="clone" aria-hidden="true" style="width: 437px; float: left; display: block;">
                            <div class="thumb-image">
                                <img src="{{ URL::to('/') }}/images/{{$data->product_image}}" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
                        </li>
                        <li data-thumb="{{ URL::to('/') }}/images/{{$data->product_image}}" style="width: 437px; float: left; display: block;" class="flex-active-slide">
                            <div class="thumb-image">
                                <img src="{{ URL::to('/') }}/images/{{$data->product_image}}" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
                        </li>
                        <li data-thumb="{{ URL::to('/') }}/images/{{$data->product_image}}" class="" style="width: 437px; float: left; display: block;">
                            <div class="thumb-image">
                                <img src="{{ URL::to('/') }}/images/{{$data->product_image}}" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
                        </li>
                        <li data-thumb="{{ URL::to('/') }}/images/{{$data->product_image}}" class="" style="width: 437px; float: left; display: block;">
                            <div class="thumb-image">
                                <img src="{{ URL::to('/') }}/images/{{$data->product_image}}" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
                        </li>
                    <li data-thumb="images/si.jpg" style="width: 437px; float: left; display: block;" class="clone" aria-hidden="true">
                            <div class="thumb-image">
                                <img src="images/si.jpg" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
                        </li></ul></div></div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>{{$data->product_title}}</h3>
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <p>
                <span class="item_price">${{$data->product_price}}</span>

                <label>Free delivery</label>
                <h6>Kho: {{$data->product_qty}}</h6>
            </p>
            <div class="single-infoagile" style="display:block;min-height:250px">
                {!!$data->product_desc!!}
                {{-- <ul>
                    <li>
                        Cash on Delivery Eligible.
                    </li>
                </ul> --}}
            </div>

            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <form action="/web/addtocart/{{$data->product_id}}" method="get">
                        <fieldset>
                            {{-- <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="business" value=" ">
                            <input type="hidden" name="item_name" value="Zeeba Premium Basmati Rice - 5 KG">
                            <input type="hidden" name="amount" value="950.00">
                            <input type="hidden" name="discount_amount" value="1.00">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="return" value=" ">
                            <input type="hidden" name="cancel_return" value=" "> --}}
                            <input type="submit" name="submit" value="Add to cart" class="button">
                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Add More
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="content-bottom-in">
            <div class="nbs-flexisel-container">
                <div class="nbs-flexisel-inner">
                    <ul id="flexiselDemo1" class="nbs-flexisel-ul" style="left: -342px;">
                        @foreach ($mores as $more)
                        <li class="nbs-flexisel-item" style="width: 307.667px;">
                            <div class="w3l-specilamk">
                                <div class="speioffer-agile">
                                    <a href="/web/product_details/{{$more->product_id}}">
                                        <img src="{{ URL::to('/') }}/images/{{$more->product_image}}" style="with:100px;height:100px">
                                    </a>
                                </div>
                                <div class="product-name-w3l">
                                    <h4>
                                        <a href="/web/product_details/{{$more->product_id}}">{{$more->product_title}}</a>
                                    </h4>
                                    <div class="w3l-pricehkj">
                                        <h6>${{$more->product_price}}</h6>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        {{-- <form action="" method="post">
                                            {{-- <fieldset>
                                                <input type="hidden" name="cmd" value="_cart">
                                                <input type="hidden" name="add" value="1">
                                                <input type="hidden" name="business" value=" ">
                                                <input type="hidden" name="item_name" value="Sprite, 2.25L (Pack of 2)">
                                                <input type="hidden" name="amount" value="180.00">
                                                <input type="hidden" name="discount_amount" value="1.00">
                                                <input type="hidden" name="currency_code" value="USD">
                                                <input type="hidden" name="return" value=" ">
                                                <input type="hidden" name="cancel_return" value=" "> --}}
                                                {{-- <input type="submit" name="submit" value="Add to cart" class="button"> --}}
                                            {{-- </fieldset> --}}
                                        {{-- </form>  --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
