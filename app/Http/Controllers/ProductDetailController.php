<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTypes;
class ProductDetailController extends Controller
{
    //
	//show product detail
    public function show($id, $slug){
    	
        $product = Product::find($id);
        $related = Product::where('idProductType',$product->idProductType)->take(5)->get();
        $topsales = Product::where('idProductType',$product->idProductType)
                            ->orderByDesc('sales')
                            ->take(5)
                            ->get();
        $configurations = json_decode($product->configuration,true);
        
        return view('client.pages.product-detail',compact('product','related','topsales','configurations'));
    }
    public function getProductsBySub($id, $slug ){
        $producttype = ProductTypes::where('slug',$slug)->first();
        //Lấy ra sản phẩm theo loại
        $products = Product::with('productType')->where('idProductType',$id)->get();
        //dd($products);
        return view('client.pages.product-type',compact('producttype','products'));
    }
}
