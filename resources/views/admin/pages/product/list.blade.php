@extends('admin.layouts.master')

@section('title')
	Danh sách sản phẩm
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th style="width: 200px;">Name</th>            
              {{-- <th>Mô tả</th> --}}
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Danh mục</th> 
              <th>Loại sản phẩm</th>  
              <th>Giá</th> 
              <th>Đã bán</th>
              <th style="width: 114px">Chỉnh sửa</th>     
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Name</th>
              {{-- <th>Mô tả</th> --}}
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Danh mục</th> 
              <th>Loại sản phẩm</th>               
              <th>Giá</th>
              <th>Đã bán</th> 
              <th>Chỉnh sửa</th> 
            </tr>
          </tfoot>
          <tbody>
          		@foreach($product as $key => $value)
		            <tr>
                  <td>{{ $value->id }}</td>
		              <td>{{ $value->name }}</td>
		             {{--  <td>{!! $value->description !!}</td> --}}
                  <td>
                    <img src="img/upload/product/{{ $value->image }}" width="100" height="100"> 
                  </td>
                  <td>{{ $value->quantity }}</td>
		              <td>{{ $value->categories->name }}</td>
		              <td>{{ $value->productType->name }}</td>                 
		              <td>{{ $value->price }}</td>
                  <td>{{ $value->sales }}</td>
		              <td>
                    <a href="{{ route('product.edit',$value->id) }}">
  		              	<button class="btn btn-primary editProduct"  data-target="#edit" type="button" title="{{ "Sửa ".$value->name }}" data-id="{{ $value->id }}"><i class="fas fa-edit" ></i>
                      </button>
                    </a>
		              	<button class="btn btn-danger deleteProduct" data-toggle="modal" data-target="#delete" type="button" title="{{ "Xóa ".$value->name }}" data-id="{{ $value->id }}"><i class="fas fa-trash-alt" ></i>
                    </button>
		              </td>
		            </tr> 
		        @endforeach       
          </tbody>
        </table>
        <div class="pull-right">{{ $product->links() }}</div>
      </div>
    </div>
  </div>
   <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">

                  <form role="form" id="updateProduct" method="POST" enctype="multipart/form-data">
              
                        <fieldset class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control name" name="name" placeholder="Nhập tên loại sản phẩm">
                            <div class="alert alert-danger errorName"></div>
                        </fieldset>  
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" name="quantity" min="1" value="1" class="form-control quantity">
                             <div class="alert alert-danger errorQuantity"></div>
                        </div>  
                        <div class="form-group">
                            <label for="price">Đơn giá</label>
                            <input type="text" name="price" placeholder="Nhập đơn giá" class="form-control price">
                             <div class="alert alert-danger errorPrice"></div>
                        </div>  
                        <div class="form-group">
                            <label for="price">Giá khuyến mãi</label>
                            <input type="text" name="promotion" value="0" placeholder="Nhập khuyến mãi nếu có" class="form-control promotion">
                             <div class="alert alert-danger errorPromotion"></div>
                        </div> 
                        <img src="" class="img img-thumbnail imageThumb" width="100" height="100" lign="center">
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image"  class="form-control image">
                             <div class="alert alert-danger errorImage"></div>
                        </div>  
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="description" id="demo" cols="5" rows="5" class="form-control description"></textarea>
                             <div class="alert alert-danger errorDescription"></div>
                        </div>        
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control cateProduct" name="idCategory"></select>                             
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select class="form-control proTypeProduct" name="idProductType"></select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control status" name="status">
                                <option value="1" class="ht">Hiển thị</option>
                                <option value="0" class="kht">Không hiển thị</option>                       
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                      </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delProduct">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
                </div>
            </div>
            </div>
          </div>
    </div>
@endsection