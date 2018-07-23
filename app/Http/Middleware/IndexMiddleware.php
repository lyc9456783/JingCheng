<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;

class IndexMiddleware
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
        $config = Config::first();
        if($config['onoff'] == 0){
            return view('welcome');
        }else{
            return $next($request);//通过  执行下一个请求
        }
    }
}
