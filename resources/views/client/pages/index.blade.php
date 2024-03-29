@extends('client.layouts.master')
@section('title')
	Trang chủ
@endsection

@section('slide')
	@include('client.layouts.slide')
@endsection

@section('content')

	<!-- tittle heading -->
	{{-- <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
		<span>O</span>ur
		<span>N</span>ew
		<span>P</span>roducts</h3> --}}
	<!-- //tittle heading -->
	<div class="row">
		<!-- product left -->
		<div class="agileinfo-ads-display col-lg-9">
			<div class="wrapper">
				<!-- first section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
					<h3 class="heading-tittle text-center font-italic">{{ $iphone[0]->categories->name }}</h3>
					<div class="row">
						@foreach($iphone as $pro)
							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<img src="img/upload/product/{{ $pro->image }}" alt="{{ $pro->name }}" class="img-fluid-index" >
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}" class="link-product-add-cart">Chi tiết</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
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
					{{-- <br>
					<div class="pull-right">{{ $iphone->links() }}</div> --}}
				</div>

				<!-- //first section -->
				<!-- second section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
					<h3 class="heading-tittle text-center font-italic">{{ $ipad[0]->categories->name }}</h3>
					<div class="row">
						@foreach($ipad as $pro)
							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<img src="img/upload/product/{{ $pro->image }}" alt="{{ $pro->name }}" class="img-fluid-index" >
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}" class="link-product-add-cart">Chi tiết</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
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
				</div>
				<!-- //second section -->
				<!-- third section -->
				{{-- <div class="product-sec1 product-sec2 px-sm-5 px-3">
					<div class="row">
						<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
						<p class="w3l-nut-middle">Get Extra 10% Off</p>
						<div class="col-md-8 bg-right-nut">
							<img src="assets/client/images/image1.png" alt="">
						</div>
					</div>
				</div> --}}
				<!-- //third section -->
				<!-- fourth section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
					<h3 class="heading-tittle text-center font-italic">{{ $apple_watch[0]->categories->name }}</h3>
					<div class="row">
						@foreach($apple_watch as $pro)
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="img/upload/product/{{ $pro->image }}" alt="{{ $pro->name }}" class="img-fluid-index" >
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}" class="link-product-add-cart">Chi tiết</a>
										</div>
									</div>
								</div>
								<span class="product-new-top">New</span>
								<div class="item-info-product text-center border-top mt-4">
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
				</div>
				<!-- //fourth section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
					<h3 class="heading-tittle text-center font-italic">{{ $accessories[0]->categories->name }}</h3>
					<div class="row">
						@foreach($accessories as $pro)
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="img/upload/product/{{ $pro->image }}" alt="{{ $pro->name }}" class="img-fluid-index" >
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="product-detail/{{ $pro->id }}/{{ $pro->slug }}" class="link-product-add-cart">Chi tiết</a>
										</div>
									</div>
								</div>
								<span class="product-new-top">New</span>
								<div class="item-info-product text-center border-top mt-4">
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
				</div>
			</div>
		</div>
		<!-- //product left -->

		<!-- product right -->
		<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
			<div class="side-bar p-sm-4 p-3">
				{{-- <div class="search-hotel border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div> --}}
				<!-- price -->
				{{-- <div class="range border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">Price</h3>
					<div class="w3l-range">
						<ul>
							<li>
								<a href="#">Under $1,000</a>
							</li>
							<li class="my-1">
								<a href="#">$1,000 - $5,000</a>
							</li>
							<li>
								<a href="#">$5,000 - $10,000</a>
							</li>
							<li class="my-1">
								<a href="#">$10,000 - $20,000</a>
							</li>
							<li>
								<a href="#">$20,000 $30,000</a>
							</li>
							<li class="mt-1">
								<a href="#">Over $30,000</a>
							</li>
						</ul>
					</div>
				</div> --}}
				<!-- //price -->
				<!-- discounts -->
				{{-- <div class="left-side border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">Discount</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% or More</span>
						</li>
					</ul>
				</div> --}}
				<!-- //discounts -->
				<!-- reviews -->
				{{-- <div class="customer-rev border-bottom left-side py-2">
					<h3 class="agileits-sear-head mb-3">Customer Review</h3>
					<ul>
						<li>
							<a href="#">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div> --}}
				<!-- //reviews -->
				<!-- electronics -->
				{{-- <div class="left-side border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">Electronics</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Accessories</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Cameras & Photography</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Car & Vehicle Electronics</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Computers & Accessories</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">GPS & Accessories</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Headphones</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Home Audio</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Home Theater, TV & Video</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Mobiles & Accessories</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Portable Media Players</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Tablets</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Telephones & Accessories</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Wearable Technology</span>
						</li>
					</ul>
				</div> --}}
				<!-- //electronics -->
				<!-- delivery -->
				{{-- <div class="left-side border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Eligible for Cash On Delivery</span>
						</li>
					</ul>
				</div> --}}
				<!-- //delivery -->
				<!-- arrivals -->
				{{-- <div class="left-side border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">New Arrivals</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Last 30 days</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Last 90 days</span>
						</li>
					</ul>
				</div> --}}
				<!-- //arrivals -->
				<!-- best seller -->
				<div class="f-grid py-2">
					<div class="single-sidebar">
		                <h3 class="agileits-sear-head mb-3">Bán chạy nhất</h3>
		                @foreach($sale_products as $product)
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
		                <h3 class="agileits-sear-head mb-3">Đã xem gần đây</h3>
		                @foreach($recently as $product)
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
		            
					{{-- <div class="box-scroll">
						<div class="scroll">
							@foreach($recently as $value)
							<div class="row">
								<div class="col-lg-3 col-sm-2 col-3 left-mar">
									<img src="img/upload/product/{{ $value->image }}" alt="" class="img-fluid">
								</div>
								<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
									<a href="">{{ $value->name }}</a>
									<a href="" class="price-mar mt-2">{{ $value->price }}</a>
								</div>
							</div>
							@endforeach --}}
							{{-- <div class="row my-4">
								<div class="col-lg-3 col-sm-2 col-3 left-mar">
									<img src="assets/client/images/k2.jpg" alt="" class="img-fluid">
								</div>
								<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
									<a href="">Haier 195 L 4 Star Direct-Cool Single Door Refrigerator</a>
									<a href="" class="price-mar mt-2">$12,499.00</a>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-sm-2 col-3 left-mar">
									<img src="assets/client/images/k3.jpg" alt="" class="img-fluid">
								</div>
								<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
									<a href="">Ambrane 13000 mAh Power Bank (P-1310 Premium)</a>
									<a href="" class="price-mar mt-2">$1,199.00 </a>
								</div>
							</div> --}}
						{{-- </div>
					</div> --}}
				</div>
				<!-- //best seller -->
			</div>
			<!-- //product right -->
		</div>
	</div>
@endsection
