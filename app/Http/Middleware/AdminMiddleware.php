<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            // if(Auth::user()->role == 1 or Auth::user()->role == 2){
        if(Auth::guard('admin')->check() == 1){
            return $next($request);
        }
        else {
            return redirect()->route('login.admin')->with('error','Bạn không có quyền vào trang này');
        }
}
}
