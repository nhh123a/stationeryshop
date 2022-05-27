@extends('web.main')

@section('content')
<h3 class="tittle-w3l">{{isset($titlew31) ? $titlew31 : 'Our Top Products' }}
    <span class="heading-style">
        <i></i>
        <i></i>
        <i></i>
    </span>
</h3>
<div class="side-bar col-md-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">Search Here..</h3>
        <form action="#" method="post">
            <input type="search" placeholder="Product name..." name="search" required="">
            <input type="submit" value=" ">
        </form>
    </div>



    <!-- deals -->
    <div class="deal-leftmk left-side">
        <h3 class="agileits-sear-head">Best sales</h3>
    @foreach ($sales as $sale)
        <div class="special-sec1">
            <div class="col-xs-4 img-deals">
                <img src="{{ URL::to('/') }}/images/{{$sale->product_image }}" style="width:60px;height:100px">
            </div>
            <div class="col-xs-8 img-deal1">
                <h3>{{ $sale->product_title }}</h3>
                <a href="/web/product_details/{{$sale->product_id}}">${{ $sale->product_price }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
    </div>
    <!-- //deals -->
</div>
<!-- //product left -->
<!-- product right -->
<div class="agileinfo-ads-display col-md-9">
<div class="wrapper">
    <!-- first section (nuts) -->
    <div class="product-sec1">
        <h3 class="heading-tittle">Pen</h3>
    @foreach ($product1 as $p)
        <div class="col-md-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="{{ URL::to('/') }}/images/{{$p->product_image}}" style="width:100px;height:100px">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="/web/product_details/{{$p->product_id}}" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>
                </div>
                <div class="item-info-product ">
                    <h4>
                        <a style="display: block;min-height: 43px" href="/web/product_details/{{$sale->product_id}}">{{$p->product_title}}</a>
                    </h4>
                    <div class="info-product-price">
                        <span class="item_price">${{$p->product_price}}</span>
                        {{-- <del>$280.00</del> --}}
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        {{-- <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Almonds, 100g" />
                                <input type="hidden" name="amount" value="149.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " /> --}}
                                {{-- <input type="submit" name="submit" value="Add to cart" class="button" /> --}}
                            {{-- </fieldset>
                        </form> --}}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
        <div class="clearfix"></div>
    </div>
    <!-- //first section (nuts) -->
    <!-- second section (nuts special) -->
    <div class="product-sec1 product-sec2">
        <div class="col-xs-7 effect-bg">
            <h3 class="">Stationery</h3>
            <h6>Enjoy our all healthy Products</h6>
            <p>Get Extra 10% Off</p>
        </div>
        <h3 class="w3l-nut-middle">__________________</h3>
        <div class="col-xs-5 bg-right-nut">
            <img src="images/nut1.png" alt="">
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //second section (nuts special) -->
    <!-- third section (oils) -->
    <div class="product-sec1">
        <h3 class="heading-tittle">Pencils</h3>
        @foreach ($product2 as $p)
        <div class="col-md-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="{{ URL::to('/') }}/images/{{$p->product_image}}" style="width:100px;height:100px">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="/web/product_details/{{$p->product_id}}" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>
                </div>
                <div class="item-info-product ">
                    <h4>
                        <a style="display: block;min-height: 43px" href="/web/product_details/{{$sale->product_id}}">{{$p->product_title}}</a>
                    </h4>
                    <div class="info-product-price">
                        <span class="item_price">${{$p->product_price}}</span>
                        {{-- <del>$280.00</del> --}}
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        {{-- <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Almonds, 100g" />
                                <input type="hidden" name="amount" value="149.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        </form> --}}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
        <div class="clearfix"></div>
    </div>
    <!-- //third section (oils) -->
    <!-- fourth section (noodles) -->
    <div class="product-sec1">
        <h3 class="heading-tittle">Notebooks</h3>
        @foreach ($product3 as $p)
        <div class="col-md-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="{{ URL::to('/') }}/images/{{$p->product_image}}" style="width:100px;height:100px">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="/web/product_details/{{$p->product_id}}" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>
                </div>
                <div class="item-info-product ">
                    <h4>
                        <a style="display: block;min-height: 43px" href="/web/product_details/{{$sale->product_id}}">{{$p->product_title}}</a>
                    </h4>
                    <div class="info-product-price">
                        <span class="item_price">${{$p->product_price}}</span>
                        {{-- <del>$280.00</del> --}}
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        {{-- <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Almonds, 100g" />
                                <input type="hidden" name="amount" value="149.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        </form> --}}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
        <div class="clearfix"></div>
    </div>
    <!-- //fourth section (noodles) -->
</div>
@endsection
