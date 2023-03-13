<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!Auth::guard('user')->check()){
        //     return redirect()->route('loginlayout')->with('no','vui long dang nhap');
        // }else if(Auth::guard('user')->user()->status == 0){
        //     Auth::guard('user')->logout();
        //     return redirect()->route('loginlayout')->with('no','Tai khoan cua ban chua dc kich hoat');
        // }
        return $next($request);
    }
}
