@extends('web.main')

@section('content')
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
    <div class="product-sec1">
    @foreach ($products as $product)
        <div class="col-xs-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="{{ URL::to('/') }}/images/{{$product->product_image}}" style="width:100px;height:120px">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="/web/product_details/{{$product->product_id}}" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    {{-- <span class="product-new-top">New</span> --}}
                </div>
                <div class="item-info-product ">
                    <h4>
                        <a style="display:block;min-height:43px" href="/web/product_details/{{$product->product_id}}">{{$product->product_title}}</a>
                    </h4>
                    <div class="info-product-price">
                        <span class="item_price">${{$product->product_price}}</span>
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        {{-- <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="add" value="1">
                                <input type="hidden" name="business" value=" ">
                                <input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG">
                                <input type="hidden" name="amount" value="950.00">
                                <input type="hidden" name="discount_amount" value="1.00">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="return" value=" ">
                                <input type="hidden" name="cancel_return" value=" ">
                                <input type="submit" name="submit" value="Add to cart" class="button">
                            </fieldset>
                        </form>
                    </div> --}}

                </div>
            </div>
            <span>
                {{ $products->links('admin.paginate') }}
            </span>
        </div>

    @endforeach
        <div class="clearfix"></div>
    </div>

</div>
@endsection
