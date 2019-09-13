@extends('admin.layouts.master')

@section('title')
	Danh sách thành viên
@endsection

@section('content')
	<div class="card shadow mb-4">
    <div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Quản lý thành viên</h6>
    </div>
    <div class="col-sm-4 form-group">
        <label for="">Tìm kiếm:</label>
        <input type="text" class="form-control" id="search" placeholder="Nhập từ khóa" value=""/>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center"  width="100%"{{--  cellspacing="0" --}}>
          <thead>
            <tr style="background-color: #3c8dbc;color:white;">
              <th style="width: 10px">STT</th>
              <th style="width: 111px">Tên thành viên</th>            
              <th style="width: 117px">Email</th>
              <th style="width: 73px">Quyền</th>
              
              <th style="width: 80px">Ngày đăng ký</th> 
              <th style="width: 30px">Thao tác</th>     
            </tr>
          </thead>
         
          <tbody>
          		@foreach($user as $key => $value)
		            <tr>
                  <td>{{ $key+1 }}</td>
		            	<td>{{ $value->name }}</td>
		              	<td>{{ $value->email }}</td>
	                 
		              <td>
                    @if( $value->role == 0)
                      {{ "Khách hàng" }}
                    @elseif( $value->role == 2)
                      {{ "Nhân viên" }}
                    @else
                      {{ "Admin" }}
                    </td>
                    @endif
		              <td>{{ $value->created_at }}</td>
		                
		              <td>
		              	<a href="{{ route('user.show',$value->id) }}" class="btn btn-info" >
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
        <div class="pull-right">{{ $user->links() }}</div>
      </div>
    </div>
  </div>
@endsection