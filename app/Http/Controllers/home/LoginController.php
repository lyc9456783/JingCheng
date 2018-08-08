<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Userdetails;
use Hash;
use DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //显示用户登录模板
        return view('home.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        //判断是否是ajax发送过来的请求
        if($request ->ajax()){
            $username = $request->input('username','');
            
            //查询数据库
            $users = Users::where('username',$username)->get();

            foreach ($users as $k => $v) {
                if($v['username']){
                    echo 1;
                }else{
                    echo 0;
                }
            }
            
            return;
        }
        //显示注册模板
        return view('home.login.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证验证码
        $this->validate($request, [

            'captcha' => 'required|captcha',
            'password' => 'required|regex:/^[a-zA-Z0-9_]{6,18}$/',
            'email' => 'required|email',
        ],[
            'captcha.required' => '验证码必填',
            'captcha.captcha' => '验证码不正确',
            'password.required' => '密码必填',
            'password.regex' => '密码格式不正确',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式不正确',
        ],[
            'password' => '密码',
            'email' => '邮箱',
            'captcha' => '验证码',

        ]);

        //接受数据进行存储
        $data = $request -> all();
        // dd($data);
        //对用户密码进行加密设置
        $password = Hash::make($data['password']);
        
        //获取最后插入数据的ID号
        $uid = DB::table('jc_users')->insertGetId(['username'=>$data['username'],'token'=>str_random(50),'email'=>$data['email'],'password'=>$password,'grade'=>3]);

        //连接用户详情表进行存储
        $details = new Userdetails;
        $details -> uid = $uid;
        $res = ($details -> save());

        //查询用户数据库信息
        $users = Users::where('id',$uid)->first();
        //对数据的添加进行整体的判断
        if ($res) {
            // session(['homeuser'=>$users]);
            // session(['homeflag'=>true]);
            return redirect('/')-> with('success','注册成功');
        }else{
            return back()->with('error','注册失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        //验证验证码
        $this->validate($request, [

        'captcha' => 'required|captcha'
        ],[
            'captcha.captcha' => '验证码不正确',
        ]);

        //获取用户输入的数据
        $data = $request -> all();

        //验证账号密码是否正确
        $username = $data['username'];
        $password = $data['password'];
        
        //查询数据库中的相对应的信息
        $users = DB::table('jc_users')->where('username','=',$username)->first();
        // dd($users);
        //判断上传的密码是否正确
        if(Hash::check($password, $users['password'])){
            $user = Users::find($users['id']); 
            $user ->login = 1;
            $user -> save();
            //设置登录成功之后把登录的用户信息存入到session中
            session(['homeuser'=>$users]);
            session(['homeflag'=>true]);
            // dd(session('homeflag'));
            return redirect('/')->with('success','登录成功');
        } else {
            return back() ->with('error','用户名或密码错误');
        }

    }

     //退出登录
    public function logout()
    {
        //消除登陆状态
        $uid = session('homeuser')['id'];
        $user = Users::find($uid);
        $user -> login = 0;
        $user -> save();
        //消除标记
        session()->flush();
        //清除session中的数据
        session(['homeflag'=>false]);
        return redirect('/')->with('success','退出成功');
    }
}
