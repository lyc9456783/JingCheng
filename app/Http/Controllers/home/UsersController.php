<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Userdetails;
use App\Models\Users;
use App\Http\Requests\home\UsersRequest;
use Mail;
use DB;
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
        
        $uid = $data['id'];

        //查询用户详细信息
        $users = Userdetails::where('uid','=',$uid)->first();
        //查询游湖表中的验证信息
        $yx = Users::where('id',$uid)->first();
        
        //加载用户中心模板
        return view('home.users.userinfo',['data'=>$data,'users'=>$users,'yx'=>$yx]);
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
     * 设置用户邮箱的绑定
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //设置验证信息
        $yanzheng = 1;
        //查询用户表中的数据
        $userdata = Users::where('id',$id)->first();
        
        //获取用户信息
        $email = $userdata['email'];
        $token = $userdata['token'];

        //对用户发送邮件,进行判断
       if(!self::sendmail($email,$id,$token)){
            $users = Users::find($id);
            $users -> yanzheng = $yanzheng;
            $users -> save();
            return redirect('/home/users/index')-> with('success','绑定成功');
       }else{
            return back()->with('error','绑定失败');
       }

        
    }


    //设置绑定用户邮箱的发送静态方法
    static public function sendmail($email,$id,$token)
    {
        Mail::send('home.users.email', [], function ($m) use ($email) {
            // $m->from('hello@app.com', 'Your Application');

            $m->to($email)->subject('京城商城,绑定邮件');
        });
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
    public function edit()
    {
        //查询session中的数据
        $data = session('homeuser');
        // dump($data);
        $uid = $data['id'];

        //查询用户表
        $users = Users::where('id','=',$uid)->first();
        // dd($users);
        //查询用户详情表
        $details = Userdetails::where('uid','=',$uid)->first();
        // dump($details);
        //加载修改用户信息模板
        return view('home.users.edit',['users'=>$users,'details'=>$details,'id'=>$uid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //接受用户上传的所有信息
        $data = $request -> all();
        // dd($data);
      
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

    //设置无刷新修改用户头像
    public function uploads(Request $request, $id)
    {   
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

        //查询数据进行存储
        $userdetails = Userdetails::where('uid',$id)->first();
        $userdetails -> face = $fileadd;
        $res = $userdetails -> save();

        if($res){
            $arr = [
                'code'=>0,
                'msg'=>'修改成功',
                'data'=>[
                    'src'=>$fileadd
                ]
            ];
        }else{
            $arr = [   
                'code'=>1,
                'msg'=>'修改失败',
                'data'=>[
                    'src'=>''
                ]
            ];
        }
        echo json_encode($arr);

    }


}
