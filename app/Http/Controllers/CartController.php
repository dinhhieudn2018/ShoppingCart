<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Auth;
use App\Http\Requests\StoreCartRequest;
use Mail;
use App\Mail\ShoppingMail;
class CartController extends Controller
{
    // public function __construct(){
    //     $category = Categories::where('status',1)->get();
    //     $producttype = ProductTypes::where('status',1)->get();
    //     view()->share(['category' => $category, 'producttype' => $producttype]);   
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $price = str_replace(',', '', Cart::total());
        return view('client.pages.cart',compact('cart','price'));
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
    public function store(StoreCartRequest $request)
    {
        $data = $request->all();
        $data['idUser'] = Auth::user()->id;
        $data['code_order'] = 'order'.rand();
        $data['status'] = 0;
        $data['total_price'] = str_replace(',', '', Cart::total());
        $data['email'] = Auth::user()->email;
        $order = Order::create($data);
        $idOrder = $order->id;
        $orderDetail = [];
        $orderDetails = [];
        foreach( Cart::content() as $key => $cart){
            $orderDetail['idOrder'] = $idOrder;
            $orderDetail['idProduct'] = $cart->id;
            $orderDetail['quantity'] = $cart->qty;
            $orderDetail['price'] = $cart->price;
            $orderDetails[$key] = OrderDetail::create( $orderDetail);
        }
        //Mail::to($order->email)->send(new ShoppingMail($order, $orderDetails));
        Cart::destroy();
        return redirect('/')->with('thongbao','Đã đặt hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            if($request->qty == 0){
                return response()->json(['error' => 'Số lượng tối thiểu là 1 sản phẩm'],200);
            }
            if($request->qty > 10){
                return response()->json(['error' => 'Số lượng tối đa là 10 sản phẩm'],200);
            }
            else{
                Cart::update($id,$request->qty);
                return response()->json(['result' => 'Đã cập nhật số lượng thành công']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return response()->json(['result' => 'Đã xóa sản phẩm thành công']);
    }

    public function addCart($id, Request $request){
        $product = Product::find($id);
        if($request->qty){
            $qty = $request->qty;
        }
        else{
            $qty = 1;
        }
        if($product->promotion>0){
            $price = $product->promotion;
        }
        else{
            $price = $product->price;
        }
        $cart = ['id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $price, 'options' => ['img' => $product->image]];
        Cart::add($cart);
        //dd(Cart::content());
        return back()->with('thongbao', 'Đã thêm '.$product->name.' vào giỏ hàng');
    }
    public function checkout(){
        $user = Auth::user(); 
        return view('client.pages.cart',compact('user'));
    }
}
