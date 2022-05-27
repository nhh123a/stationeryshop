@extends('web.main')

@section('content')
<div class="container">
	<form action="/web/cart/buy" method = "get">
	<div class="check-out">
		<h1>Checkout</h1>
    	<table class="table">
		  <tr>
			<th>Item</th>
			<th>Qty</th>
			<th>Prices</th>
			<th>Total</th>
            <th>Delete</th>
		  </tr>
          {{$total = 0}}
          @foreach ($data as $d)
            <tr>
                <th>{{ $d->product->product_title}}</th>
                <th>{{ $d->qty}}</th>
                <th>${{ $d->product->product_price}}</th>
                <th>${{$d->qty * $d->product->product_price}}</th>
                <th><a href="/web/cart/delete/{{$d->id}}">Delete</a></th>
                {{$total += $d->qty * $d->product->product_price}}
            </tr>
          @endforeach
	</table>
	<div>
	<input type="submit" style="background-color: #52D0C4" value="PROCEED TO BUY" />
	</form>
	<p style="float: right;margin-right:20px;">TOTAL: ${{ $total}}</p>

	</div>
	<div class="clearfix"> </div>
    </div>
</div>

@endsection
