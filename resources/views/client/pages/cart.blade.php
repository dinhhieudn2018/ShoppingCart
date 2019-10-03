@extends('client.layouts.master')

@section('title')
	Giỏ hàng
@endsection

@section('content')
<style type="text/css">
	table, th, td {
  		border: 1px solid black;
  		border-collapse: collapse;
  		/*color: #777;*/
  	}
	.cart-total, .shipping, .order-total {
		background: #f4f4f4;
		font-weight: bold;
		padding: 10px 0px 10px 10px;
	}
}
</style>
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Trang chủ</a>
						<i>|</i>
					</li>
					<li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>G</span>iỏ hàng của bạn {{-- {{ Auth::user()->name }} --}}
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				{{-- <h4 class="mb-sm-4 mb-3">Bạn có tổng cộng:
					<span>{{ Cart::count() }} sản phẩm</span>
				</h4> --}}
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Hình ảnh</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>

								<th>Đơn giá</th>
								<th>Chỉnh sửa</th>
							</tr>
						</thead>
						<tbody>
							@if( Cart::count() > 0)
							<?php $i = 1; ?>
							@foreach($cart as $value)
							
								<tr class="rem1">
									<td class="invert">{{ $i }}</td>
									<td class="invert-image">
										<a href="#">
											<img src="img/upload/product/{{ $value->options->img }}" width="100" height="100" alt="{{ $value->name }}" >
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="form-group">
												{{-- <input type="hidden" name="row_id" class="row_id form-control" value="{{ $value->rowId }}"> --}}
												<input type="number" name="qty" class="qty form-control" value="{{ $value->qty }}" min="1" max="10" data-id="{{ $value->rowId }}">
											</div>
										</div> 
									</td>
									<td class="invert">{{ $value->name }}</td>
									<td class="invert">{{ number_format($value->price) }} VND</td>
									<td class="invert">
										<div class="rem">
											<div class="close1" data-id="{{ $value->rowId }}"> </div>
										</div>
									</td>
								</tr>
								<?php $i++; ?>

							@endforeach
							
							@else
                                <tr class="text-center">
                                    <td colspan="6" >  Bạn chưa mua sản phẩm nào </td>
                                </tr>

                            @endif
						</tbody>
					</table>
					{{-- <h4 class="mb-sm-4 mb-3" style="margin-top: 10px" align="right">Tổng cộng:
									<span>{{ number_format(Cart::total())  }} VND</span>
								</h4> --}}
				</div>
			</div>
			<div style="margin-bottom: 20px">
				
			</div>

			<div class="row">
		<div class="col-sm-7">
			<div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						<h5 style="float: left;"><i class="fas fa-comments"></i> Thông tin đặt hàng</h5>
						
						<div class="checkbox" style="clear: both;">
							<div class="check_box_one cashon_delivery">
								@if(Auth::check())
								<form action="{{ route('cart.store') }}" method="post" class="creditly-card-form agileinfo_form">
									@csrf
									<div class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row">
												<div class="controls form-group">
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Họ và tên" value="{{Auth::user()->name }}">
													@if($errors->has('name'))
								                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
								                    @endif
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left form-group">
														<div class="controls">
															<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{ Auth::user()->phone }}">
															@if($errors->has('name'))
										                        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
										                    @endif
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right form-group">
														<div class="controls">
															<input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{ Auth::user()->address }}">
															@if($errors->has('name'))
										                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
										                    @endif
														</div>
													</div>
												</div>
												<div class="controls form-group">	
													<textarea class="form-control message" placeholder="Ghi chú"  rows="4" maxlength="1000" name="message"></textarea>
												</div>
											</div>
											
										</div>
									</div>
									<button class="btn submit check_out" type="submit">Đặt hàng</button>

								</form>
								@else
								<p style="font-weight: bold;">
									Vui lòng <a href="{{ route('client-login') }}" {{-- data-toggle="modal" data-target="#exampleModal" --}}>ĐĂNG NHẬP</a> để đặt hàng
								</p>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-sm-5">
			<div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						<h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Đơn hàng</h5>
						
						<div class="checkbox">
							<div class="check_box_one cashon_delivery">
								{{-- <label class="anim">
									
								</label> --}}
								<table style="width: 100%">
										<tr>
											<th class="cart-total">Tổng số hàng</th>
											<td style="text-align: center;">{{ Cart::count() }}</td>
										</tr>
										<tr>
											<th class="shipping">Phí vận chuyển</th>
											<td style="text-align: center;">{{ "Miễn phí" }}</td>
										</tr>
										<tr>
											<th class="order-total">Tổng thanh toán</th>
											<td style="color: red; font-weight: bold; text-align: center;">{{ number_format($price)  }} VNĐ</td>
										</tr>
									</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		</div>
	</div>
@endsection
@section('script')
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$(document).ready(function(){
			//cập nhật số lượng
			$('.qty').blur(function(){
				let rowId = $(this).data('id');
				$.ajax({
					url : 'cart/'+rowId,
					type : 'post',
					dataType : 'json',
					data : {
						qty : $(this).val(),
						_method: 'put',
					},
					success : function(data){
						console.log(data);
						if(data.error){
							toastr.error(data.error, 'Thông báo', {timeOut: 5000});
						}
						else{
							toastr.success(data.result, 'Thông báo', {timeOut: 5000});
							window.location.reload(true);
						}	
					}
				});
			});
			//Xóa sản phẩm khỏi giỏ hàng
			$('.close1').click(function(){
				let rowId = $(this).data('id');
				$.ajax({
					url : 'cart/'+rowId,
					type : 'post',
					dataType : 'json',
					data : { _method: 'delete',
					},
					success : function(data){
						console.log(data);
						toastr.success(data.result, 'Thông báo', {timeOut: 5000});
						window.location.reload(true);
					}
				});
			});
		});
	</script>
@endsection