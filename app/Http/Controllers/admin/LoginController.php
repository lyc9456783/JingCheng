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
     
        return view('admin.login.login');
    }


    /**
     * 核查密码
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {   

        //验证验证码
        $this->validate($request, [

        'captcha' => 'required|captcha'
        ],[
            'captcha.captcha' => '验证码不正确',
        ]);
        
        // 接收用户名和密码
        $username = $request -> input('username');
        $password = $request -> input('password');
     
        //查找用户名用户 并且权限是管理员
        $data = DB::table('jc_users')->where('grade','<','3')->where('username','=',$username)->first();

        //检查密码
        if(Hash::check($password, $data['password'])){
            session(['username'=>$username,'uid'=>$data['id']]);
            session(['adminflag'=>true]);
            return redirect( url('admin') )->with('success','管理员登陆');
        } else {
            return back() ->with('error','密码错误');
        } 
    }


    //修改密码页面
    public function change()
    {
        return view('admin.login.change');
    }

    //修改密码
    public function changepass(Request $request)
    {
         $data = $request -> all();
         //dump($data);

         //查用户
         $users = DB::table('jc_users')->where('grade','<','3')->where('id','=',$data['uid'])->first();
         //验证原密码 
         if(Hash::check($data['pass'], $users['password'])){
                //判断两次新密码是否一致
                if($data['password'] == $data['foo_confirmation'])
                {
                    $users = Users::find($data['uid']);
                    $users -> password = Hash::make($data['password']);
                    $users -> save();
                    session(['adminflag'=>false]);

                    //修改成功跳回登陆页面
                    return redirect('/admin/login')-> with('success','密码修改成功');   
                }else{
                    //修改失败返回修改页面
                    return back()->with('error','两次输入的密码不一致'); 
                }
          } else {
            //原密码错误返回修改页面
             return back() ->with('error','密码错误');
          } 

        // $this->validate($request, [
        //     'title' => 'required|unique:posts|max:255',
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);

    }







    //后台退出
    public function loginOut()
    {
        session(['adminflag'=>false]);
        return redirect('/admin/login/login')->with('success','退出成功');

    }


}
