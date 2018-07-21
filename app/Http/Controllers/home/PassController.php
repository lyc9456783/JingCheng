<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Address;
use App\Models\Discuss;
use Hash;
class PassController extends Controller
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
        $users = Users::where('id','=',$uid)->first();
        //加载用户中心模板
        return view('home.users.password',['users'=>$users,'id'=>$uid]);
    }


    public function update(Request $request,$id)
    {
        //查询用于的所有信息
        $data= Users::find($id);
        // dd($data['id']);
        //晒找出用户的单独密码进行解密判断
        $pass = $data['password'];
        //获取用户修改时上传的密码先与旧密码进行比对as
        $word = $request -> all();
        //验证是否输入旧 新密码
        $req = $request -> has('old_password');
        $req2 = $request -> has('new_password');
        $req3 = $request -> has('comfirm_password');
        if($req){
            if($req2){
                if($req3){
                    //首先进行原密码输入的是否正确的判断
                    if(Hash::check($word['old_password'], $pass))
                    {   
                        if($word['new_password'] == $word['comfirm_password'])
                        {
                            $users = Users::find($id);
                            // dd($users);
                            $users -> password = Hash::make($word['comfirm_password']);
                            $users -> save();

                            return redirect('home/pass/index')-> with('success','修改成功');   
                        }else{
                            return back()->with('error','重复密码不正确'); 
                        }
                    }else{
                        return back()->with('error','原密码不正确');
                    }   
                }else{
                    return back()->with('error','请重复新密码');
                }
            }else{
                return back()->with('error','新密码不能为空');
            }
        }else{
            return back()->with('error','原密码不能为空');
        }
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
