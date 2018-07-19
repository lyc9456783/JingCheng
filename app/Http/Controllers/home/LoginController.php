<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
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
        ],[
            'captcha.captcha' => '验证码不正确',
        ]);

        //接受数据进行存储
        $data = $request -> all();
        
        //对用户密码进行加密设置
        $password = Hash::make($data['password']);
        
        //连接数据库进行存储
        $user = new Users;
        $user -> username = $data['username'];
        $user -> password = $password;
        $user -> email = $data['email'];
        $user -> grade = 3;
        $res = ($user -> save());

        //对数据的添加进行整体的判断
        if ($res) {
            session(['homeuser'=>$user]);
            session(['homeflag'=>true]);
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
        //消除标记
        session(['homeflag'=>false]);
        return redirect('/')->with('success','退出成功');
    }
}
