<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Address;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取session中的数据
        $data = session('homeuser');
        //获取当前登录用户的id
        $uid = $data['id'];
        $address = Address::where('uid',$uid)->get();
        // dump($address);
        return view('home.address.address',['title'=>'收货地址列表','title1'=>'添加地址','data'=>$address,'id'=>$uid]);
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
    public function store(Request $request,$id)
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
                return redirect('home/address/index')-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','请补全所有内容');
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
        $data = Address::find($id);
        return view('home.orders.addressedit',['title'=>'修改收货地址','title2'=>'添加收货地址','id'=>$id,'data'=>$data]);
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
                return redirect('home/address/index')-> with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            return back()->with('error','请补全所有内容');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $address = Address::find($id);
        $res = $address->delete();
        if($res){
            return redirect('home/address/index')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
