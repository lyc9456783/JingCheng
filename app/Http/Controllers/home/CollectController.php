<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Goods;
use App\Models\Collect;
class CollectController extends Controller
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
        $data = Collect::where('uid',$uid)->get();
        return view('home.collect.index',['title'=>'我的收藏列表','data'=>$data]);
    }


    //删除
    public function delete($id)
    {
        $data = Collect::find($id);
        $res = $data -> delete();
        if($res){
            return redirect('/home/collect/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除成功');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcollect(Request $request)
    {
        $gid = $request->input('gid');
        $uid = $request->input('uid');
        $res = Collect::where('gid',$gid)->where('uid',$uid)->first();
        if($res){
                echo 0;
        }else{
            $data = $request->all();
            // var_dump($data);
            $collect = new Collect;
            $collect-> uid = $data['uid'];
            $collect-> gid = $data['gid'];
            $res = $collect->save();
            if($res){
                echo 1;
            }
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
