@extends('admin.layouts.master')

@section('title')
	Danh sách đơn hàng
@endsection

@section('content')
	<div class="card shadow mb-4">
    <div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Quản lý đơn đặt hàng</h6>
    </div>
    <div class="col-sm-4 form-group">
        <label for="">Tìm kiếm:</label>
        <input type="text" class="form-control" id="search" placeholder="Nhập từ khóa" value=""/>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center" id="dataTable" width="100%"{{--  cellspacing="0" --}}>
          <thead>
            <tr style="background-color: #3c8dbc;color:white;">
              <th style="width: 10px">STT</th>
              <th style="width: 111px">Tên khách hàng</th>            
              <th style="width: 10px">Phone</th>
              <th style="width: 73px">Địa chỉ</th>
              <th style="width: 117px">Tiền thanh toán</th> 
              <th style="width: 80px">Ngày tạo</th>
              <th style="width: 112px">Ngày thanh toán</th>         
              <th style="width: 82px">Trạng thái</th> 
              <th style="width: 50px">Thao tác</th>     
            </tr>
          </thead>
         {{--  <tfoot>
            <tr>
              <th>STT</th>
              <th>Name</th>
              <th>Mô tả</th>
              <th>Thông tin</th>
              <th>Danh mục sản phẩm</th> 
              <th>Loại sản phẩm</th>               
              <th>Status</th> 
              <th>Chỉnh sửa</th> 
            </tr>
          </tfoot> --}}
          <tbody>
          		@foreach($order as $key => $value)
		            <tr>
                  		<td>{{ $value->id }}</td>
		            	<td>{{ $value->name }}</td>
		              	<td>{{   $value->phone }}</td>
	                  <td>{{ $value->address }}</td>
		              <td>{{ number_format($value->total_price) }}&nbsp;VNĐ</td>
		              <td>{{ $value->created_at }}</td>
		              <!-- status = 2 nghĩa là đã thanh toán-> cập nhật ngày thanh toán -->
		              <td>{{ ($value->status == 2) ? $value->updated_at : '' }}</td>           
		              <td>
		              	@if ($value->status == 0) <!-- đơn hàng chờ duyệt -->
		              	{{ "Chờ duyệt" }}
		              	@elseif ($value->status == 1) <!-- đơn hàng đang chuyển -->
		              	{{ "Đang chuyển hàng" }}
                    @elseif ($value->status == 2) <!-- đơn hàng đã thanh toán -->
                    {{ "Đã thanh toán" }}
		              	@else ($value->status == 3) <!-- đơn hàng đã hủy -->
		              	{{ "Đã hủy" }}
		              	@endif
		              </td>               
		              <td>
		              	<a href="{{ route('order.edit',$value->id) }}" class="btn btn-info" >
		              		<span>Xem</span>
		              </a>
		          		</td>
		             {{--  <td>
	                    <a href="{{ route('product.edit',$value->id) }}">
	  		              	<button class="btn btn-primary editProduct"  data-target="#edit" type="button" title="{{ "Sửa ".$value->name }}" data-id="{{ $value->id }}"><i class="fas fa-edit" ></i>
	                      </button>
	                    </a>
			              	<button class="btn btn-danger deleteProduct" data-toggle="modal" data-target="#delete" type="button" title="{{ "Xóa ".$value->name }}" data-id="{{ $value->id }}"><i class="fas fa-trash-alt" ></i>
	                    </button>
		              </td> --}}
		            </tr> 
		        @endforeach       
          </tbody>
        </table>
        <div class="pull-right">{{ $order->links() }}</div>
      </div>
    </div>
  </div>
@endsection