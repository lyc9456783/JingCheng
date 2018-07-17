<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Goods;
use App\Models\Discuss;
use DB;

class ProductController extends Controller
{
    /**
     * 商品详情页
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        //单品商品详情[替换id]
        $goods = Goods::find($id);
       
        //评论的条数
        $discuss_count = DB::table('jc_discuss')->where('gid','=',$id)->count();
         //$data = Slids::where('surl','like','%'.$search.'%')->paginate(5)->appends($request->input());
        //评论属于哪个用户
        $discuss = Discuss::where('gid','=',$id)->paginate(5);
        //dump($discuss);

        return view('home.product.index',['goods'=>$goods,'discuss_count'=>$discuss_count,'discuss'=>$discuss]);
    }

    /**
     * 商品购物车验证
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        dump($request -> all());
    }

    /**
     * 保存ajax 发送的评论信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $data = $request->only(['email','content','gid','uid','rank']);
       //dump($data);
       //存储
       $discuss =new Discuss;
       //$discuss -> email = $data['email'];
       $discuss -> content = $data['content'];
       $discuss -> rank = $data['rank'];
       $discuss -> gid = $data['gid'];
       $discuss -> uid = $data['uid'];
       $res = $discuss -> save();

       //ajax 返回值
       if($res){
        echo 1;
       }else{
        echo 0;
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
