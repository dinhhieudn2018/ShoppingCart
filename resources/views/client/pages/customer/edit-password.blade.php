@extends('client.layouts.master')

@section('title')
	Chỉnh sửa mật khẩu
@endsection

@section('content')
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h1>Chỉnh sửa mật khẩu </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3" style="margin: auto;">
		<form action="{{ route('put-password',Auth::user()->id) }}" method="post">
			@csrf
			<div class="form-group">
				<label class="col-form-label">Nhập mật khẩu cũ</label>
				<input type="password" class="form-control" name="password" >
				@if($errors->has('password'))
					<div class="alert alert-danger">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Nhập mật khẩu mới</label>
				<input type="password" class="form-control" name="new_password">
				@if($errors->has('new_password'))
					<div class="alert alert-danger">{{ $errors->first('new_password') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label class="col-form-label">Nhập lại mật khẩu mới</label>
				<input type="password" class="form-control"  name="re_password">
				@if($errors->has('re_password'))
					<div class="alert alert-danger">{{ $errors->first('re_password') }}</div>
				@endif
			</div>
			
			<div class="right-w3l">
				<input type="submit" class="form-control" value="Thực hiện">
			</div>
			
			
		</form>
	</div>
@endsection