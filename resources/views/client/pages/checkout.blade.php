@extends('client.layouts.master')

@section('title')
	Đặt hàng
@endsection

@section('content')
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
					<li>Đặt hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-8">
			<div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						<h5 style="float: left;"><i class="fas fa-comments"></i> Thông tin đặt hàng</h5>
						
						<div class="checkbox" style="clear: both;">
							<div class="check_box_one cashon_delivery">
								
								<form action="" method="post" class="creditly-card-form agileinfo_form">
									<div class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row">
												<div class="controls form-group">
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Họ và tên" required="">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left form-group">
														<div class="controls">
															<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" required="">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right form-group">
														<div class="controls">
															<input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
														</div>
													</div>
												</div>
												<div class="controls form-group">
													
													<textarea class="form-control message" placeholder="Ghi chú"  rows="4" maxlength="1000" ></textarea>
												</div>
												
											</div>
											
										</div>
									</div>
									<button class="btn submit check_out" type="submit">Đặt hàng</button>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-sm-4">
			<div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						<h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Đơn hàng</h5>
						
						<div class="checkbox">
							<div class="check_box_one cashon_delivery">
								<label class="anim">
									<p style="float: left;">Giá sản phẩm</p>
									<p style="float: left; margin-left: 19px">@if(Auth::check()){{ number_format($price) }} VNĐ @else 0 @endif
									</p>
									<p style="float: left;">Phí vận chuyển</p>
									<p style="float: left; margin-left: 32px">{{ number_format(20000) }} VNĐ</p>
									<p style="float: left;">Tổng thanh toán</p>
									<p style="float: left; margin-left: 59px; margin-top: 5px">@if(Auth::check()){{ number_format($price + 20000) }} VNĐ @else 0 @endif</p>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px" >
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						<div class="vertical_post check_box_agile">
						<h5 style="text-align: center;"><i class="fas fa-comments"></i> Ghi chú</h5>
							<textarea placeholder="Bạn có nhắn gì tới shop không?" style="width: 245px" rows="4" maxlength="1000"></textarea>
						</div>
					</div>
				</div>
			</div> --}}
			{{-- <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px" >
				<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
					<div class="vertical_post check_box_agile">
						
						
						<div class="checkbox">
							<div class="check_box_one cashon_delivery">
								<label class="anim">
									<p style="float: left;">Tổng thanh toán</p>
									<p style="float: left;">{{ number_format($price + 20000) }} VNĐ</p>

								</label>
								<label>
									<button class="btn submit check_out">Tiến hành thanh toán</button>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
 --}}		</div>
	</div>
	<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Thay đổi địa chỉ giao hàng</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						
						<div class="form-group">
							<label class="col-form-label">Địa chỉ email</label>
							<input type="text" class="form-control email" placeholder="Nhập email " name="email" required="">
							
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại</label>
							<input type="text" class="form-control phone" placeholder="Nhập số điện thoại " name="phone" required="">
							
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ</label>
							<input type="text" class="form-control address" placeholder="Nhập địa chỉ " name="address" required="">
							
						</div>
						<div class="right-w3l">
							<button class="btn btn-primary form-control" >Lưu</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	
@endsection