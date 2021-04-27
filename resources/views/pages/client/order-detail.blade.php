@extends('layout.client.index')
@section('title','Order details')
@section('content')
<main>
	<section class="container cart space-title">
		<h2 class="text-center title-cart mb-5">
			<span class="title-big">Order details</span>
		</h2>
		@if($orders -> detail)
		<div class="cart-table table-responsive">
			<table class="table-bordered">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders -> detail as $k => $det)
					@php
                        $thanhtien = $det->price*$det->quantity;
                    @endphp
					<tr>
						<td class="cart-pic">
							<a href="">
                            <img src="{{ asset('public/Uploads/products') }}/{{$det->getPro->image}}" alt="error">
							</a>
						</td>
						<td class="">
							<a href="">
								<p>{{$det->getPro->name}}</p>
							</a>
						</td>
						<td class="price-root">{{number_format($det->price)}} VNĐ</td>
						<td>
							<div class="quantity">
								{{$det->quantity}}
							</div>
						</td>
						<td class="price">{{number_format($thanhtien)}} VND</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<div class="panel-body mb-5">
            <div class="alert alert-danger">
                <strong>You do not have any orders, </strong> click <a href="{{route('product')}}">here</a> to purchase....
            </div>
        </div>
		@endif
	</section>
</main>
@endsection
