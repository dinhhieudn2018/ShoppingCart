<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Http\Requests\StoreProductRequest;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('status',1)->paginate(10);
        return view('admin.pages.product.list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        $configurations = [
                    'Màn hình' => '',
                    'Hệ điều hành' => '',
                    'Camera sau' => '',
                    'Camera trước' => '',
                    'CPU' => '',
                    'RAM' => '',
                    'Thẻ SIM' => '',
                    'Dung lượng pin' => '',
                ];
        return view('admin.pages.product.add',compact('category','producttype','configurations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $key = $request->configuration['key'];
        $value = $request->configuration['value'];
        $configuration = array_combine($key,$value);
        //dd($configuration);
        if($request->hasFile('image')){
            $file = $request->image;
            // Lấy tên file
            $file_name = $file->getClientOriginalName();
            // Lấy loại file
            $file_type = $file->getMimeType();
            // Kích thước file với đơn vị byte
            //$file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'gif'){
                $file_name = date('D_m_yyyy').'-'.rand().'-'.str_slug($file_name);
                if($file->move('img/upload/product',$file_name)){
                    $data = $request->all();
                    $data['slug'] = str_slug($request->name);
                    $data['image'] = $file_name;
                    $data['configuration'] = json_encode($configuration); //chuyển array sang json và lưu trong csdl
                    Product::create($data);
                    return redirect()->route('product.index')->with('thongbao','Đã thêm sản phẩm mới');
                }
            }
            else{
                return back()->with('error', 'File bạn chọn không phải hình ảnh');
            }
        }
        else{
            return back()->with('error', 'Bạn chưa chọn ảnh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        $product = Product::find($id);      
        $configurations = json_decode($product->configuration,true); //chuyển json sang array
        //return response()->json(['category' => $category, 'producttype' => $producttype, 'product' => $product],200);
        return view('admin.pages.product.edit',compact('category','producttype','product','configurations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $key = $request->configuration['key'];
        $value = $request->configuration['value'];
        $configuration = array_combine($key,$value);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        $data['configuration'] = json_encode($configuration);
        if($request->hasFile('image')){
            $file = $request->image;
            // Lấy tên file
            $file_name = $file->getClientOriginalName();
            // Lấy loại file
            $file_type = $file->getMimeType();
            // Kích thước file với đơn vị byte
            //$file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'gif'){
                $file_name = date('D_m_yyyy').'-'.rand().'-'.str_slug($file_name);
                if($file->move('img/upload/product',$file_name)){                  
                    $data['image'] = $file_name;
                    if(File::exists('img/upload/product'.$product->image)){
                        //Xóa file
                        unlink('img/upload/product'.$product->image);
                    }
                }
            }
            else{
                return response()->json(['error' => 'File bạn chọn không phải là hình ảnh'],200);
            }
        }else{
            $data['image'] = $product->image;
        }
        if($product->update($data)){
            return redirect()->route('product.index')->with('thongbao','Đã cập nhật thành công');
        }
        else{
            return redirect()->route('product.index');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists('img/upload/product/'.$product->image)){
            unlink('img/upload/product/'.$product->image);
        }
        $product->delete();
        return response()->json(['result' => 'Đã xóa thành công'],200);
    }

    public function getConfiguration(){
        $configurations = [
                    'Màn hình' => '',
                    'Hệ điều hành' => '',
                    'Camera sau' => '',
                    'Camera trước' => '',
                    'CPU' => '',
                    'RAM' => '',
                    'Thẻ SIM' => '',
                    'Dung lượng pin' => '',
                ];
        //$view = view('admin.pages.product.configuration',compact(['configurations']))->render();
        //return response()->json(['view'=>$view],200);
                //dd($configurations);
        return view('admin.pages.product.configuration',compact('configurations'));
    }
}
