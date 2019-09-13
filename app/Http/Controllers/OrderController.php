<?php

namespace App\Http\Controllers;

// use App\Order;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::orderBy('created_at','DESC')->paginate(5);
        return view('admin.pages.order.list',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        //$orderDetail = OrderDetail::find($id);
        //$product = OrderDetail::with('Product')->find($id);
        //dd($order);
        return view('admin.pages.order.detail',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrderRequest $request, $id)
    {
        $order = Order::find($id);
        $data = $request->all();
        $products = $request->product;
        //dd($products);
        $total_price = 0;
        foreach($products as $id => $quantity){
            
            $product = Product::find($id);
            //dd($product);
            $total_price += $product['price'] * $quantity['quantity'];
            $order->Products()->updateExistingPivot($id,$quantity); //cập nhật row trong bảng trung gian
        }

        $data['status'] = $request->status;
        $data['total_price'] = $total_price;
        $order->update($data);
        
        //nếu đơn hàng đã thanh toán thì trừ số lượng sản phẩm trong kho
        if($order->status == 2){
            foreach( $products as $id => $quantity){

                $product = Product::findOrFail($id);
                $product->quantity = $product->quantity - $quantity['quantity'];
                $product->sales = $product->sales + $quantity['quantity'];
                $product->save();
            }
        }
        $request->session()->flash('ok', 'Đã cập nhật thành công');
        //dd($order->id);
        return redirect()->route('order.edit',$order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
