<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Hash;
class DetailUserController extends Controller
{
    public function show($id){
    	$user = User::with('Order')->find($id);
    	return view('client.pages.customer.profile',compact('user'));
    }
    public function getEdit($id){
    	$user = User::find($id);
    	return view('client.pages.customer.edit-profile',compact('user'));
    }
    public function updateProfile(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect('info/'.$id);
    }
    public function getEditPassword(){
    	return view('client.pages.customer.edit-password');
    }
    public function putPassword(Request $request,$id){
        $this->validate($request,[
            'password' => 'required',
            'new_password' => 'required',
            're_password' => 'same:new_password',
        ],[
            'password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            're_password.same' => '2 mật khẩu mới phải giống nhau'
        ]);

        $user = User::find($id);
        if(Hash::check($request->password,$user['password'])){
            $user->password = Hash::make($request->new_password);
            $user->remember_token = $request->_token;
            $user->save();
            return redirect('info/'.$id);
        }else{
            return redirect()->back();
        }
    }
}
