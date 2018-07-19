<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Userdetails;
use App\Models\Users;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //查询session中的数据
        $data = session('homeuser');
        // dump($data);
        $uid = $data['id'];

        //查询用户详细信息
        $users = Userdetails::where('uid','=',$uid)->first();

        //加载用户中心模板
        return view('home.users.userinfo',['data'=>$data,'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询数据
        //查询用户表
        $users = Users::where('id','=',$id)->first();
        //查询用户详情表
        $details = Userdetails::where('uid','=',$id)->first();
        // dump($details);
        //加载修改用户信息模板
        return view('home.users.edit',['users'=>$users,'details'=>$details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接受用户上传的所有信息
        $data = $request -> all();
        // dd($data);
        //处理保存图片
        if($request -> hasFile('face')){
            
            // 使用request 创建文件上传对象
            $profile = $request -> file('face');

            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();

            // 处理文件名称
            $temp_name = str_random(20);
            $filename =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());

            // 保存文件
            $profile -> move('./uploads/hpic/'.$dirname,$filename); 
            $fileadd = ('/uploads/hpic/'.$dirname.'/'.$filename);
            // dump($fileadd);
            //查找数据库数据,进行 修改
            $users = Users::find($id);
            $users -> email = $data['email'];
            $res = $users -> save();
            // dump($res);
            
            $userdetails = Userdetails::where('uid',$id)->first();
            // dd($userdetails);
            $userdetails -> nickname = $data['nickname'];
            $userdetails -> id_card = $data['id_card'];
            $userdetails -> phone = $data['phone'];
            $userdetails -> sex = $data['sex'];
            $userdetails -> addr = $data['addr'];
            $userdetails -> face = $fileadd;
            $res2 = $userdetails -> save();
            // dd($res2);

            if ($res || $res2 == true) {
                return redirect('/home/users/index')-> with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            } 
        }else{


            //查找数据库数据,进行 修改
            $users = Users::find($id);
            $users -> email = $data['email'];
            $res = $users -> save();
            // dump($res);
            
            $userdetails = Userdetails::where('uid',$id)->first();
            // dd($userdetails);
            $userdetails -> nickname = $data['nickname'];
            $userdetails -> id_card = $data['id_card'];
            $userdetails -> phone = $data['phone'];
            $userdetails -> sex = $data['sex'];
            $userdetails -> addr = $data['addr'];
            $res2 = $userdetails -> save();
            // dd($res2);

            if ($res || $res2 == true) {
                return redirect('/home/users/index')-> with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
