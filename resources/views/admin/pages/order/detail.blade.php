@extends('admin.layouts.master')

@section('title')
	Chi tiết đơn hàng
@endsection

@section('content')
<style type="text/css">
   
</style>
	<div class="col-lg-12" style="padding-bottom:120px">
        <form action="{{ route('order.update',$order->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="box-header">
                        <h5>Thông tin đơn hàng (Mã: {{ $order->id }})</h5>
                        
                    </div> 
                </div>
                <div class="col-lg-6 ">
                    <div class="box-header" style="margin-left: 70px;">
                      <label style="font-size: 18px;font-weight: bold;">Tình trạng</label>&nbsp&nbsp
                            <select name="status">
                                <option value="0" @if($order->status == 0) selected="" @endif>Chờ duyệt</option>
                                <option value="1" @if($order->status == 1) selected="" @endif>Đang chuyển hàng</option>
                                <option value="2" @if($order->status == 2) selected="" @endif>Đã thanh toán</option>
                                <option value="3" @if($order->status == 3) selected="" @endif>Đã hủy</option>
                            </select>   
                    </div>   
                </div>
                <hr>
                <div class="col-lg-5">
                    <div class="">
                         <label for="name" class="col-lg-3 pr-0">Tên</label>
                        <input type="text" name="name" id="name" class="none-style" value="{{ $order->name }}" >  
                    </div>
                    <div>
                        <label class="col-lg-3 pr-0  ">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="none-style" value="{{ $order->phone }}">
                    </div> 
                    <div>
                        <label class="col-lg-3 pr-0">Địa chỉ</label>
                        <textarea type="text" name="address" id="address" class="none-style" style="resize: none;">{{ $order->address }} </textarea>
                    </div> 
                    <div>
                        <label class="col-lg-3 pr-0">Ngày đặt</label>
                        <input type="text" class="none-style" value="{{ $order->created_at }}" readonly="">
                    </div>
                    <div>
                        <label class="col-lg-3 pr-0">Ghi chú</label>
                        <textarea type="text" name="message" id="message" class="none-style" style="resize: none;">{!! $order->message !!} </textarea>
                        
                       
                    </div>
                    
                </div>
                <div class="col-lg-7">
                    <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <td>Mã SP</td>
                                    <td>Sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Giá</td>  
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse($order->Products as $key => $product)
                                    <tr>
                                        <td>{{  $product->id}}</td>
                                        <td>
                                            <a href="{{ route('product.edit',$product->id) }}">{{  $product->name}}</a>
                                        </td>
                                        <td>
                                            <input type="number"  class='quantity' min="1" name="product[{{$product->id}}][quantity]" 
                                            value="{{  $product->pivot->quantity }}" style="width: 50px">
                                        </td>
                                        <td>
                                            {{  number_format($product->price) }}&nbsp;VNĐ
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                   
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Tổng tiền</strong></td>
                                    <td colspan="2"><strong><span>{{ number_format($order->total_price) }} VNĐ</span></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                </div>
                 
                
            </div>
            @if(Session::has('ok'))
                <div style="color: red;font-weight: bold;text-align: center; font-size: 30px;">
                    {{ Session::get('ok') }}
                </div>
            @endif
            <div class="text-center">
                @if($order->status != 2 && $order->status != 3)
                   
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                @endif

                <a href="{{ route('order.index') }}" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
        
    </div>
@endsection