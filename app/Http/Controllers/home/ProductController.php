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
     * @param  传入商品的ID
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
          $search = $request -> input('search','');  

        
        //dump($search);
        //单品商品详情
        $goods = Goods::find($id);
       
        //评论统计
        $discuss_count = DB::table('jc_discuss')->where('gid','=',$id)->count();
        if($discuss_count == 0){$discuss_count =0.1;}
        $discuss_count_good = DB::table('jc_discuss')->where('gid','=',$id)->where('rank','=',3)->count();
        $discuss_count_between = DB::table('jc_discuss')->where('gid','=',$id)->where('rank','=',2)->count();
        $discuss_count_bad = DB::table('jc_discuss')->where('gid','=',$id)->where('rank','=',1)->count();
         //$data = Slids::where('surl','like','%'.$search.'%')->paginate(5)->appends($request->input());


        //评论属于哪个用户
        $discuss= Discuss::where('gid','=',$id)->where('rank','like','%'.$search.'%')->paginate(2)->appends($request->input());
        //dump($discuss);

        return view('home.product.index',['goods'=>$goods,
                                  'discuss_count'=>$discuss_count,
                                  'discuss_count_good'=>$discuss_count_good,
                                  'discuss_count_between'=>$discuss_count_between,
                                  'discuss_count_bad'=>$discuss_count_bad,
                                  'discuss'=>$discuss,
                                  ]);
    }



    /**
     * 商品购物车验证 成功后跳转确认订单页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //接收 商品id号  当前已显示的库存
        $data = $request -> only(['goods_kc','gid']);
        //库存中查找商品
        $goods = DB::table('jc_entrepots')->where('gid','=',$data['gid'])->first();
        //库存有商品可以购买
        if(($goods['num']-1)>=0){
            //商品从库存中减一
            DB::table('jc_entrepots')->where('gid','=',$data['gid'])->update(['num'=>($goods['num']-1)]);
            $data = Goods::find($data['gid']);
           // dump($data);
 
        }else{
            return back() -> with('success','已经售空');
        }
     return view('home.product.buySuccess',['data'=>$data]);
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
