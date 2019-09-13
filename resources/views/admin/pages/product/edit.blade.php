@extends('admin.layouts.master')
@section('title')
	Sửa sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
    </div>
	 <div class="col-lg-12">

            <form role="form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @method('put')
            	@csrf
                <fieldset class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" name="name" placeholder="Nhập tên loại sản phẩm" value="{{ $product->name }}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </fieldset>  
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" min="1" value="1" class="form-control" value="{{ $product->quantity }}">
                    @if($errors->has('quantity'))
                        <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>  
                <div class="form-group">
                    <label for="price">Đơn giá</label>
                    <input type="text" name="price" placeholder="Nhập đơn giá" class="form-control" value="{{ $product->price }}">
                    @if($errors->has('price'))
                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>  
                <div class="form-group">
                    <label for="price">Giá khuyến mãi</label>
                    <input type="text" name="promotion" value="0" placeholder="Nhập khuyến mãi nếu có" class="form-control" value="{{ $product->promotion }}">
                    @if($errors->has('promotion'))
                        <div class="alert alert-danger">{{ $errors->first('promotion') }}</div>
                    @endif
                </div> 
                <div class="form-group">
                    <label for="image">Hình ảnh</label><br>
                    <span>Ảnh cũ</span><br>
                    <img src="img/upload/product/{{ $product->image }}" width="100" height="100">
                    <input type="file" name="image"  class="form-control">
                    @if($errors->has('image'))
                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>  
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="description" id="demo" cols="5" rows="5" class="form-control">{{ $product->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Thông số kỹ thuật</label>
                            <table class="table configuration">
                          
                            @if(is_array($configurations))
                               @forelse($configurations as $key => $value)
                                    <tr>
                                        <td width="160px">
                                            <input class="form-control" name='configuration[key][]' type='text' value="{{ $key }}"/>
                                        </td>
                                        <td>
                                            <input class="form-control" name='configuration[value][]' type='text' value="{{ $value }}"/>
                                        </td>
                                    </tr> 
                                @empty
                                @endforelse
                            @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control cateProduct" name="idCategory" style="margin-top: 12px">
                                    @foreach($category as $cate)
                                    <option value="{{ $cate->id }}" @if($cate->id == $product->idCategory) selected="" @endif>{{ $cate->name }}</option>   
                                    @endforeach                                     
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control proTypeProduct" name="idProductType" style="margin-top: 12px">
                                    @foreach($producttype as $pro)
                                    <option value="{{ $pro->id }}" @if($pro->id == $product->idProductType) selected="" @endif>{{ $pro->name }}</option>   
                                    @endforeach                                     
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" style="margin-top: 12px">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>                       
                                </select>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="text-center pt-3">
                     <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Quay lại</button>
                </div> 
            </form>
	   </div>
    </div>
@endsection