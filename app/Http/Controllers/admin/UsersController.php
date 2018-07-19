<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Userdetails;
use DB;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取请求的参数,也就是说需要搜索额参数
        $search = $request -> input('search','');  //表示如果有值就进行搜索,没有值就为空

        //设置查询数据库中的信息
        $data = Users::where('username','like','%'.$search.'%')->paginate(3)->appends($request->input());

        //设置计算数据表中所有信息的数量
        $count = DB::table('jc_users')->whereNull('deleted_at')->count();
        
        //用户列表
        return view('admin.users.index',['data'=>$data,'count'=>$count,'title'=>'用户列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //用户添加
        return view('admin.users.add',['title'=>'添加用户']);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //查询用户表中的所有用户
         $this->validate($request, [

            'username' => 'required|unique:jc_users',
        ],[
            'username.unique' => '用户名已存在',
        ]);

          //获取数据
        $data = $request -> all();
        // dd($data);


        $data['password'] = Hash::make($data['password']);
        
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

            //获取最后插入数据的ID号
            $uid = DB::table('jc_users')->insertGetId(['username'=>$data['username'],'email'=>$data['email'],'password'=>$data['password'],'grade'=>$data['grade']]);
        
            //添加用户详情表中的数据
            $res = DB::table('jc_user_details')->insert(['uid'=>$uid,'face'=>$fileadd,'nickname'=>$data['nickname'],'id_card'=>$data['id_card'],'phone'=>$data['phone'],'sex'=>$data['sex'],'addr'=>$data['addr']]);
            
            //对数据的添加进行整体的判断
            if ($res == true) {
                return redirect('/admin/users/index')-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }

        } else {

            //设置用户的默认头像
            $fileadd = ('/uploads/hpic/mr/'.'CHZEvbLFV707vZ1ONYuT.jpg'); 

            //获取最后插入数据的ID号
            $uid = DB::table('jc_users')->insertGetId(['username'=>$data['username'],'email'=>$data['email'],'password'=>$data['password'],'grade'=>$data['grade']]);
        
            //添加用户详情表中的数据
            $res = DB::table('jc_user_details')->insert(['uid'=>$uid,'face'=>$fileadd,'nickname'=>$data['nickname'],'id_card'=>$data['id_card'],'phone'=>$data['phone'],'sex'=>$data['sex'],'addr'=>$data['addr']]);
            
            //对数据的添加进行整体的判断
            if ($res == true) {
                return redirect('/admin/users/index')-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        } 
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //设置软删除数据
    public function del($id)
    {
        //获取数据进行软删除
        $users = Users::find($id);

        $res = $users -> delete();

        //判断软删除是否删除
        if ($res == true) {
            return redirect('/admin/users/destroy')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }

    public function edit($id)
    {
        //通过id获取数据进行对模板中进行分配
        $data = Users::find($id);
        // dd($data);
        //加载视图显示要更改的信息
        return view('admin.users.edit',['data'=>$data,'title'=>'修改信息']);
    }

    //设置用户密码的模板显示
    public function pass($id)
    {
         //通过id获取数据进行对模板中进行分配
        $data = Users::find($id);
        // dd($data);
        //加载视图显示要更改的信息
        return view('admin.users.password',['data'=>$data,'title'=>'修改密码']);
    }

    //获取用户的密码进行修改
    public function passupdate(Request $request, $id)
    {   
        //查询用于的所有信息
        $data= Users::find($id);
        // dd($data['id']);
        //晒找出用户的单独密码进行解密判断
        $pass = $data['password'];

        //获取用户修改时上传的密码先与旧密码进行比对
        $word = $request -> all();
        
        //首先进行原密码输入的是否正确的判断
        if(Hash::check($word['oldpass'], $pass))
        {   
            if($word['newpass'] == $word['repass'])
            {
                $users = Users::find($id);
                // dd($users);
                $users -> password = Hash::make($word['repass']);
                $users -> save();

                return redirect('/admin/users/index')-> with('success','修改成功');   
            }else{
                return back()->with('error','重复密码不正确'); 
            }
        }else{
            return back()->with('error','原密码不正确');
        }   
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
        //获取数据
        $data = $request -> all();
        
        //查找数据库数据,进行 修改
        $users = Users::find($id);

        $users -> username = $data['username'];
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
            return redirect('/admin/users/index')-> with('success','修改成功');
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
    public function destroy(Request $request)
    {
        //获取被软删除用户的数据
        $data = Users::onlyTrashed()->paginate(3)->appends($request->input());

        // dump($data);
        //分配数据到模板
        return view('admin.users.rdelete',['data'=>$data,'title'=>'用户回收站']);
    }


      /**
     * 设置用户信息还原
     *
     * @param  int  $id
     */
    public function reset($id)
    {
        $res = Users::withTrashed()->where('id','=',$id)->restore();
        
        if ($res == 1) {
            return redirect('/admin/users/index')-> with('success','还原成功');
        }else{
            return back()->with('error','还原失败');
        }
    }


    //设置永久删除数据
    public function delete($id)
    {   
        $data = Userdetails::where('uid',$id)->first();
        // dd($res2);
        $res2 = $data->delete();

        //设置永久删除回收站中的数据
        $res = Users::onlyTrashed()->where('id','=',$id)->forceDelete();

        //判断是否删除成功
         if ($res && $res2) {
            return redirect('/admin/users/index')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


    //设置批量删除用户方法
    public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';

        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);

        //进行软删除
        $res = Users::destroy($id);

    }
}
