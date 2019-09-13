<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\OrderDetail;
use Auth;
use Validator;
use Hash;
use Cart;
use App\Http\Requests\StoreUserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status',0)->paginate(5);
        //dd($user);
        return view('admin.pages.user.list',compact('user'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id);
        $user = User::with('Order')->find($id);
        //dd($user);
        return view('admin.pages.user.detail',compact('user'));
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
        $user = User::find($id);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        //$data['role'] = $request->role;
        $user->update($data);
        $request->session()->flash('ok', 'Sửa thành công');
        return redirect()->route('user.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function redirectProvider($social){
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social){
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return back()->with('thongbao','Đăng nhập thành công');
    }
    private function findOrCreateUser($user){
        $authUser = User::where('social_id',$user->id)->first();
        if($authUser){
            return $authUser;
        }
        else{
            return User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => '',
                    'phone' => '',
                    'address' => '',
                    'social_id' => $user->id,
                    'role' => 0,
                    'status' => 0,
                    'avatar' => $user->avatar,
                ]);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
             return redirect('/')->with('thongbao','Đăng xuất thành công');
            //return redirect('/')->with('thongbao','Đăng xuất thành công');
        }
    }

    public function getClientLogin(){
        if(Auth::check() && Auth::user()->role === 0){
            return redirect('/');
        }
        return view('client.pages.customer.login');
    }

    public function loginClient(StoreUserRequest $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>0])){
            return redirect('/')->with('thongbao','Đăng nhập thành công');;
            //dd('đang nhập thành công');
        }
        else{
            return back()->with('error','Đăng nhập thất bại');
        }
    }

    public function getRegister(){
        return view('client.pages.customer.register');
    }

    public function registerClient(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required|min:2|max:20',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|min:10',
                'address' => 'required|min:2|max:20',
                'password' => 'required|min:5|max:255',
                're_password' => 'required|same:password',
            ],
            [
                'name.required' => 'Tên không được bỏ trống',
                'name.min' => 'Tên tối thiểu 2 ký tự',
                'name.max' => 'Tên tối đa 255 ký tự',
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
                'phone.required' => 'Số điện thoại không được bỏ trống',
                'phone.numeric' => 'Số điện thoại không đúng định dạng',
                'address.required' => 'Địa chỉ không được bỏ trống',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu tối thiểu 5 ký tự',
                'password.max' => 'Mật khẩu tối đa 255 ký tự',
                're_password.required' => 'Không được bỏ trống',
                're_password.same' => 'Nhập không đúng với trường mật khẩu',
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        //$user = User::create($data);
        if($user = User::create($data)){
            Auth::login($user);
            return redirect('/')->with('thongbao', 'Đã đăng ký thành công');
        }
        else{
            return back()->with('error','Đăng ký thất bại');
        }
        
    }

    // public function loginAdmin(Request $request){
    //     $data = $request->only('email','password');
    //     if(Auth::attempt($data, $request->has('remember'))){
    //         if(Auth::user()->role == 1){
    //             return redirect('admin/')->with('thongbao','Đăng nhập thành công');
    //         }
    //         else if(Auth::user()->role == 2)
    //             return redirect()->route('product.index');
    //         else if(Auth::user()->role == 3)
    //             return redirect()->route('order.index');
    //     }
    //     else{
    //         return redirect()->route('login.admin')->with('error','Đăng nhập thất bại');
    //     }
    // }
}
