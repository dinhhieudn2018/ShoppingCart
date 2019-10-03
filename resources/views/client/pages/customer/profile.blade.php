@extends('client.layouts.master')

@section('title')
	Thông tin người dùng
@endsection

@section('content')
<style type="text/css">
    table tr td {
        border: 1px solid #ddd;
        text-align: center;

    }
</style>
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h1>Thông tin người dùng </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container" >
        <div class="col-md-8 col-md-offset-4" style="margin: 0 auto;">
            <div class="row">
                <div class="col-md-4">
                    <b> Tên </b>
                    <p> {{ $user->name }} </p>
                </div>

                <div class="col-md-4">
                    <b>  Email</b>
                    <p> {{$user->email}} </p>
                </div>

                <div class="col-md-4">
                    <b>  Số điện thoại </b>
                    <p> {{ $user->phone }} </p>
                </div>


                <div class="col-md-4">
                    <b>  Địa chỉ  </b>
                    <p> {{ $user->address }} </p>
                </div>

                <div class="col-md-4">
                    <b>  Thay đổi thông tin </b>
                    <p> <a href="{{ url('info/edit',Auth::user()->id) }}">Chỉnh sửa</a> </p>
                </div>

                <div class="col-md-4">
                    <b>  Thay đổi mật khẩu </b>
                    <p> <a href="{{ url('edit-password') }}" > Chỉnh sửa</a> </p>
                </div>

            </div>
            <br><br>
        </div>
        
        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h1>Đơn hàng gần đây</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        <div class="col-md-12 col-md-offset-1">
           
            <table class="table table-hover">
                <tr>
                    <td> Mã đơn hàng </td>
                    <td>Hình ảnh</td>
                    <td> Sản phẩm  </td>
                    <td>Ngày đặt hàng</td>
                    <td> Giá tiền  </td>
                    <td> Tình trạng  </td>
                   {{--  <td> Thao tác  </td> --}}
                </tr>
                @if($user->order->count() > 0)
                @foreach($user->order as $value)
                    @foreach($value->Products as $key => $product)
                    {{-- {{ dd($value->Products) }} value trỏ sang product để lấy thông tin bảng product --}}
                            <tr style="line-height: 35px">
                                <td> {{$value->id}} </td>
                                <td width="120px">
                                    <img width="70px" height="70px" src="img/upload/product/{{ $product->image }} " alt="">
                                </td>
                                <td>
                                    <a href="product-detail/{{ $product->id }}/{{ $product->slug }}">{{ $product->name }}</a>
                                </td>
                                <td> {{ Carbon\Carbon::createFromTimestamp(strtotime($value->created_at))->format('j-m-Y h:m:s') }} </td>
                                <td>{{ number_format($product->price,0,',','.')}} VND</td>
                                <td>
                                    @if($value->status == 0)
                                        <span class="badge badge-primary">Chờ duyệt</span>
                                   @elseif($value->status == 1)
                                        <span class="badge badge-info">Đang chuyển hàng</span>
                                    @elseif($value->status == 2)  
                                        <span class="badge badge-success">Đã thanh toán</span> 
                                    @else
                                          <span class="badge badge-danger">Đã hủy</span>
                                    @endif
                                </td>
                              {{--   <td class="text-center">
                                    @if($value->status !== 2)
                                        <a class="badge badge-danger" href="{{ URL::route('delete-product-cart',[$orders->id,$product->id]) }}"> Hủy </a>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">Bạn chưa mua sản phẩm nào</td>
                    </tr>
                    @endif
            </table>
        </div>
    </div>
@endsection