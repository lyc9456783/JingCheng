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
    public function pass($id)
    {
        $data = Users::find($id);
        return view('home.users.pass',['title'=>'修改密码','data'=>$data,'id'=>$id]);
    }

    public function passupdate(Request $request,$id)
    {
        //查询用于的所有信息
        $data= Users::find($id);
        // dd($data['id']);
        //晒找出用户的单独密码进行解密判断
        $pass = $data['password'];

        //获取用户修改时上传的密码先与旧密码进行比对
        $word = $request -> all();
        // dump($word);
        
        //首先进行原密码输入的是否正确的判断
        if(Hash::check($word['oldpass'], $pass))
        {   
            if($word['newpass'] == $word['repass'])
            {
                $users = Users::find($id);
                // dd($users);
                $users -> password = Hash::make($word['repass']);
                $users -> save();

                return redirect('home/users/consignee/'.$id)-> with('success','修改成功');   
            }else{
                return back()->with('error','重复密码不正确'); 
            }
        }else{
            return back()->with('error','原密码不正确');
        }  
    }






        //前台收货人地址列表
    public function address($id)
    {
        $address = Address::where('uid',$id)->get();
        // dump($address);
        return view('home.users.address',['title'=>'收货地址列表','title1'=>'添加地址','data'=>$address,'id'=>$id]);
    }


    // //添加收货人地址
    // public function addressadd($id)
    // {
    //     $data = Address::where('uid',$id)->get();
    //     return view('home.users.addressadd',['title'=>'添加收货地址','data'=>$data,'id'=>$id]);
    // }

    //执行添加
    public function addressstore(Request $request,$id)
    {
        $req = $request->except(['_token']);
        $has = $request->has(['name','phone','address','postcode','s_xj']);
        if($has){
            $address = new Address;
            $address -> uid = $id;
            $address -> name = $req['name'];
            $address -> phone = $req['phone'];
            $address -> address = $req['s_sf'].$req['s_sq'].$req['s_xj'].$req['address'];
            $address -> postcode = $req['postcode'];
            $address -> label = $req['label'];
            $res = $address->save();
            // dump($res);
            if($res){
                return redirect('home/users/address/'.$id)-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','请补全所有内容');
        }
    }




    //前台收货人地址修改
    public function addressedit($id)
    {
        $data = Address::find($id);
        return view('home.users.addressedit',['title'=>'修改收货地址','title2'=>'添加收货地址','id'=>$id,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 修改收货人地址
    public function addressupdate(Request $request,$id)
    {
        $req = $request->except(['_token']);
        $has = $request->has(['name','phone','address','postcode']);
        if($has){
            $address = Address::find($id);
            $address -> name = $req['name'];
            $address -> phone = $req['phone'];
            $address -> address = $req['address'];
            $address -> postcode = $req['postcode'];
            $address -> label = $req['label'];
            $res = $address->save();
            if($res){
                return redirect('home/users/address/'.$address['uid'])-> with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            return back()->with('error','请补全所有内容');
        }

    }

    //删除收货地址
    public function addressdelete($id)
    {
        $address = Address::find($id);
        $res = $address->delete();
        if($res){
            return redirect('home/users/address/'.$address['uid'])-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }





    //前台我的评论
    public function discuss($id)
    {
        $data = Discuss::where('uid',$id)->get();
        return view('home.users.discuss',['title'=>'我的评论','data'=>$data,'id'=>$id]);

    }

    //前台评论删除
    public function discussdelete($id)
    {
        $data = Discuss::find($id);
        $res = $data -> delete();
        if($res){
            return redirect('home/users/discuss/'.$data['uid'])-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
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
    public function update(Request $request, $id)
    {
        //
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
