@extends('client.layouts.master')
@section('title')
	Đăng nhập
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="product-bit-title text-center">
                <h2>Đăng nhập</h2>
            </div>
        </div>
    </div>
    <br><br>
	<div class="col-md-6 col-md-offset-3" style="margin: auto;">
		<form action="{{ route('client-login') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="col-form-label">Địa chỉ email</label>
				<input type="text" class="form-control" placeholder="Nhập email " name="email" required="">
				@if($errors->has('email'))
				<div class="alert alert-danger">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Mật khẩu</label>
				<input type="password" class="form-control" placeholder="Nhập mật khẩu " name="password" required="">
				@if($errors->has('password'))
				<div class="alert alert-danger">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<div class="right-w3l">
				<input type="submit" class="form-control" value="Đăng nhập">
			</div>
			<div class="right-w3l">
				<a href="login/facebook" class="btn btn-primary" id="loginfb">Đăng nhập bằng Facebook</a>
			</div>
			<div class="right-w3l">
				<a href="login/googl/google" class="btn btn-primary" id="logingoogle">Đăng nhập bằng Google</a>
			</div>
			<div class="sub-w3l">
				<div class="custom-control custom-checkbox mr-sm-2">
					<input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
					<label class="custom-control-label" for="customControlAutosizing" >Nhớ mật khẩu</label>
				</div>
			</div>
			<p class="text-center dont-do mt-3">Chưa có tài khoản?
				<a href="{{ route('client-register') }}" {{-- data-toggle="modal" data-target="#register" --}}>
					Đăng ký ngay</a>
			</p>
		</form>
	</div>
@endsection