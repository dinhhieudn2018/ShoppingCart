@extends('client.layouts.master')
@section('title')
	Chi tiết sản phẩm
@endsection

@section('content')
<style type="text/css">
	.fb-comments, .fb-comments span, .fb-comments span iframe{
            width:100% !important;
            display:inline-block !important;
            max-width:100% !important
        }
</style>
	<div class="page-head_agile_info_w3l"></div>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{ url('/') }}">Trang chủ</a>
						<i>|</i>
					</li>
					<li>{{ $product->productType->name }}<i>|</i></li>
					<li>{{ $product->name }}</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			{{-- <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>S</span>ingle
				<span>P</span>age</h3> --}}
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							
									<div class="thumb-image">
										<img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								
								
							
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{ $product->name }}</h3>
					<p class="mb-3">
						@if($product->promotion>0)
							<span class="item_price">{{ number_format($product->promotion) }}</span>
							<del class="mx-2 font-weight-light">{{ number_format($product->price) }}</del>
						@else
							<span class="item_price">{{ number_format($product->price) }}</span>
						@endif
						<label>Free Ship</label>
					</p>
					
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>Bảo hành 1 năm</label></p>
						<ul class="parameter">
							@foreach($configurations as $key => $value)
							<li class="mb-1">
								<span>{{ $key }}</span> 
								<div> {{ $value }}</div>
							</li>
							@endforeach
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Thanh toán online/ ATM card
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<a href="{{ route('addCart',['id' =>$product->id]) }}">Thêm vào giỏ hàng</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div id="description" style="word-wrap: break-word;">
				{!! $product->description !!}
			</div>
			<div id="fb-root"></div>
			<div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
			
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=397310390880261&autoLogAppEvents=1"></script>
		</div>
		<div class="col-md-4">
			<div class="single-sidebar">
                <h2 class="sidebar-title">Sản phẩm khác</h2>
                @foreach($related as $product)
                    <div class="thubmnail-recent">
                        <img src="img/upload/product/{{ $product->image }}"
                             class="recent-thumb" alt="">
                        <h5><a href="product-detail/{{ $product->id }}/{{ $product->slug }}">{{ $product->name }}</a></h5>
                        <div class="product-sidebar-price">
                            {{ number_format( $product->price ) }}đ
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="single-sidebar">
                <h2 class="sidebar-title">Sản phẩm bán chạy</h2>
                @foreach($topsales as $product)
                    <div class="thubmnail-recent">
                        <img src="img/upload/product/{{ $product->image }}"
                             class="recent-thumb" alt="">
                        <h5><a href="product-detail/{{ $product->id }}/{{ $product->slug }}">{{ $product->name }}</a></h5>
                        <div class="product-sidebar-price">
                            {{ number_format( $product->price ) }}đ
                        </div>
                    </div>
                @endforeach
            </div>
		</div>
	</div>
@endsection
