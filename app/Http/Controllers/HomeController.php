<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $iphone = Product::where('idCategory',1)->take(3)->get();
        $ipad = Product::where('idCategory',2)->get();
        $apple_watch = Product::where('idCategory',3)->get();
        $accessories = Product::where('idCategory',4)->get();
        $recently = Product::inRandomOrder()->limit(3)->get(); // lấy sản phẩm ngẫu nhiên
        $sale_products = Product::all()->sortByDesc('sales')->take(3);
        //dd($new_products);
        return view('client.pages.index',compact('iphone','ipad','apple_watch','accessories','recently','sale_products'));
    }
}
