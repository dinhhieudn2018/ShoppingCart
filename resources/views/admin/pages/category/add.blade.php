@extends('admin.layouts.master')
@section('title')
	Thêm danh mục
@endsection
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
	 <div class="col-lg-12">

            <form role="form" action="{{ route('category.store') }}" method="POST">
            	@csrf
                <fieldset class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Nhập tên danh mục">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </fieldset>            
                
                
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Hiển thị</option>
                        <option value="0">Không hiển thị</option>                       
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thêm</button>
                <button type="reset" class="btn btn-primary">Nhập lại</button>

            </form>
	</div>
    </div>
@endsection