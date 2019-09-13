<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    // public function getLogin(){
    //     return view('admin.pages.login');
    // }
    public function loginAdmin(Request $request){
        $data = $request->only('email','password');
        $remember = $request->has('remember') ? true : false;
        if(Auth::guard('admin')->attempt($data, $remember)){
            return redirect()->route('admin.index')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect()->route('login.admin')->with('error','Đăng nhập thất bại');
        }
    }
    public function logout(){
        if(Auth::guard('admin')){
            Auth::guard('admin')->logout();
             return redirect()->route('login.admin')->with('thongbao','Đăng xuất thành công');
            //return redirect('/')->with('thongbao','Đăng xuất thành công');
        }
    }
}
