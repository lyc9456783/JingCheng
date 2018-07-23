<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        // 检测session是否存在用户名 
        if(session('adminflag')){
            return $next($request);//通过  执行下一个请求
        }else{
            // 失败返回登录页面
            return redirect('/admin/login');
        }
    }
}
