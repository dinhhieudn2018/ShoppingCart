<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;
class GoogleController extends Controller
{
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
    	Auth::login($authUser);
    	return redirect('/');
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
	    			'ruler' => 0,
	    			'status' => 0,
	    			'avatar' => $user->avatar,
	    		]);
    	}
    }
    public function logout(){
    	if(Auth::check()){
    		Auth::logout();
    		return redirect('/');
    	}
    }
}
