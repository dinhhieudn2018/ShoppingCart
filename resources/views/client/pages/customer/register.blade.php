@extends('client.layouts.master')
@section('title')
	Đăng ký
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="product-bit-title text-center">
                <h2>Đăng ký</h2>
            </div>
        </div>
    </div>
    <br><br>
	<div class="col-md-6 col-md-offset-3" style="margin: auto;">
		<form action="/register" method="post">
			@csrf
			<div class="form-group">
				<label class="col-form-label">Họ và tên</label>
				<input type="text" class="form-control" placeholder="Nhập họ và tên" name="name" required="">
				@if($errors->has('name'))
				<div class="alert alert-danger">{{ $errors->first('name') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Địa chỉ email</label>
				<input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" required="">
				@if($errors->has('email'))
				<div class="alert alert-danger">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Số điện thoại</label>
				<input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" required="">
				@if($errors->has('phone'))
				<div class="alert alert-danger">{{ $errors->first('phone') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Địa chỉ</label>
				<input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" required="">
				@if($errors->has('address'))
				<div class="alert alert-danger">{{ $errors->first('address') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Mật khẩu</label>
				<input type="password" class="form-control" placeholder="Nhập mật khẩu " name="password" id="password1" required="">
				@if($errors->has('password'))
				<div class="alert alert-danger">{{ $errors->first('password') }}</div>
				
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Nhập lại mật khẩu</label>
				<input type="password" class="form-control" placeholder="Nhập lại mật khẩu " name="re_password" id="password2" required="">
				@if($errors->has('re_password'))
				<div class="alert alert-danger">{{ $errors->first('re_password') }}</div>
				
				@endif
			</div>
			<div class="right-w3l">
				<input type="submit" class="form-control" value="Đăng ký">
			</div>
			<div class="sub-w3l">
				<div class="custom-control custom-checkbox mr-sm-2">
					<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
					<label class="custom-control-label" for="customControlAutosizing2">Đồng ý với điều khoản của chúng tôi</label>
				</div>
			</div>
		</form>
	</div>
@endsection