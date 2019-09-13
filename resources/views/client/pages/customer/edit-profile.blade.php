@extends('client.layouts.master')

@section('title')
	Chỉnh sửa thông tin
@endsection

@section('content')
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h1>Chỉnh sửa thông tin người dùng </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3" style="margin: auto;">
		<form action="{{ route('update-profile',$user->id) }}" method="post">
			@csrf
			<div class="form-group">
				<label class="col-form-label">Tên</label>
				<input type="text" class="form-control" name="name" value="{{ $user->name }}">
			</div>
			<div class="form-group">
				<label class="col-form-label">Email</label>
				<input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
				
			</div>
			<div class="form-group">
				<label class="col-form-label">Điện thoại</label>
				<input type="text" class="form-control"  name="phone" value="{{ $user->phone }}">
			</div>
			<div class="form-group">
				<label class="col-form-label">Địa chỉ</label>
				<input type="text" class="form-control" name="address" value="{{ $user->address }}">
			</div>
			<div class="right-w3l">
				<input type="submit" class="form-control" value="Gửi">
			</div>
			
			
		</form>
	</div>
@endsection