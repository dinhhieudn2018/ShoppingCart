@extends('admin.layouts.master')

@section('title')
	Quản lý thành viên
@endsection

@section('content')

	<div class="col-lg-12" style="padding-bottom:120px">
        <form action="{{ route('user.update',$user->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-header">
                        <h5>Thông tin thành viên (Mã: {{ $user->id }})</h5>
                        
                    </div> 
                </div>

                <div class="col-lg-6 ">
                    <div class="">
                         <label for="name" class="col-lg-3 pr-0">Tên</label>
                        <input type="text" name="name"  class="none-style" value="{{ $user->name }}" >  
                    </div>
                    <div>
                        <label class="col-lg-3 pr-0  ">Email</label>
                        <input type="text" name="email"  class="none-style" value="{{ $user->email }}" readonly="">
                    </div> 
                    <div>
                        <label class="col-lg-3 pr-0  ">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="none-style" value="{{ $user->password }}"  min="10">
                    </div> 
                     
                </div>
                <div class="col-lg-6 ">
                    <div>
                        <label class="col-lg-3 pr-0  ">Số điện thoại</label>
                        <input type="text" name="phone"  class="none-style" value="{{ $user->phone }}" >
                    </div>  
                    <div>
                        <label class="col-lg-3 pr-0">Ngày đăng ký</label>
                        <input type="text" name="created_at" class="none-style" value="{{ $user->created_at }}" readonly="">
                    </div>
                    <div>
                        <label class="col-lg-3 pr-0">Địa chỉ</label>
                        <input type="text" name="address" class="none-style" value="{{ $user->address }}" >
                    </div>

                    {{-- <div>
                        <label class="col-lg-3 pr-0">Quyền</label>
                            <select name="role">
                                <option value="1" @if($user->role == 1) selected="" @endif>Admin</option>
                                <option value="2" @if($user->role == 2) selected="" @endif>Nhân viên</option>
                                <option value="0" @if($user->role == 0) selected="" @endif>Khách hàng</option> 
                            </select>   
                    </div>  --}}
                </div>
                <hr>
               
                 
                
            </div>
            @if(Session::has('ok'))
                <div style="color: red;font-weight: bold;text-align: center; font-size: 30px;">
                    {{ Session::get('ok') }}
                </div>
            @endif
            <div class="text-center pt-3">
               {{--  @if($order->status != 2 && $order->status != 3) --}}
                   
                    <button type="submit" class="btn btn-success">Cập nhật</button>
               {{--  @endif --}}

                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
         <div class="box box-success col-sm-12">
                    <div class="box-header">
                        <h3 class="box-title">Lịch sử mua hàng</h3>
                    </div>
                    <div class="box-body">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã đơn hàng</td>
                                    <td>Tổng tiền</td>
                                    <td>Tình trạng</td>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse($user->order as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                         <td>
                                            <a href="{{ route('order.edit',$value->id) }}">{{ $value->id  }}</a>
                                         </td>
                                          <td>{{ number_format($value->total_price) }}</td>
                                           <td>
                                            @if($value->status == 0)
                                            {{ "Chờ duyệt" }}
                                            @elseif($value->status == 1)
                                             {{ "Đang chuyển hàng" }}
                                             @elseif($value->status == 2)
                                             {{ "Đã thanh toán" }}
                                             @else
                                             {{ "Đã hủy" }}
                                             @endif
                                             
                                            </td>
                                    </tr>
                                   @empty
                                        Bạn chưa có đơn hàng nào !
                                    @endforelse
                                </tbody>
                               
                            </table>
                    </div>
                </div>
    </div>
@endsection