<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Models\Users;
use Hash;
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
     * 核查密码
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        // 接收用户名和密码
        $username = $request -> input('username');
        $password = $request -> input('password');
     
        //查找用户名用户 并且权限是管理员
        $data = DB::table('jc_users')->where('grade','>','1')->where('username','=',$username)->first();

        //检查密码
        if(Hash::check($password, $data['password'])){
            session(['username'=>$username]);
            return redirect( url('admin') )->with('success','管理员登陆');
        } else {
            return back() ->with('error','密码错误');
        } 
    }



}
