<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class LoginController extends Controller
{
    /**
     * 后台登陆验证
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
     
        return view('admin.login');
    }

    /**
     * 核查用户名和密码
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        // 
      //$request -> isMethod('post');
        $username = $request -> input('username');
        //dump($username);
        $password = $request -> input('password');
        //dd($password);
        $data = DB::table('jc_users')->where('username','=',$username)->first();
        if($data['password'] == $password)
        {
            session(['username'=>$username],10);
            return redirect( url('admin/users') );
        } else {
            return redirect() -> back();
        }
     

        
    }



}
