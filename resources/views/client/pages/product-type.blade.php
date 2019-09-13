@extends('client.layouts.master')

@section('title')
	Danh sách sản phẩm theo loại
@endsection

@section('content')
	<div class="page-head_agile_info_w3l"></div>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{ url('/') }}">Trang chủ</a>
						<i>|</i>
					</li>
					<li>{{ $producttype->slug }}</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		@foreach($products as $pro)
		<div class="col-md-3 product-men mt-5">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item text-center">
					<img src="img/upload/product/{{ $pro->image }}" alt="{{ $pro->name }}" class="img-fluid-index" >
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
				</div>
				<div class="item-info-product text-center border-top mt-3">
					<h4 class="pt-1">
						<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}">{{ $pro->name }}</a>
					</h4>
					<div class="info-product-price my-2">
						@if($pro->promotion>0)
							<span class="item_price">
								{{ number_format($pro->promotion) }}
							</span>
							<del>{{ number_format($pro->price) }}</del>
						@else
							<span class="item_price">
								{{ number_format($pro->price) }}
							</span>
						@endif
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<a href="{{ route('addCart',['id' =>$pro->id]) }}">Thêm vào giỏ hàng</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row text-center">
	  {{--   {{ $products->links() }} --}}
	</div>
@endsection