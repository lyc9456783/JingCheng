<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Recommends;

class GoodsController extends Controller
{
    /**
     * 商品列表页
     *
     * 
     */
    public function index(Request $request,$id)
    {
        $data = Cates::find($id);
        $dir = $request->input('dir');
        //当没有查询条件时查询分类下的所有商品
        //判断分类是否为一级分类 及pid是否为0
        if($data->pid){
            $data = Goods::where('gcid',$id)->get();
        }else{
            $gcid = [];
            $cates = Cates::where('pid',$id)->get();
            foreach ($cates as $k=>$v){
                $gcid[] = $v->id;
            }
            $data = Goods::whereIn('gcid',$gcid)->get();
            // dump($goods);
        }
            //判断搜索条件
            if($request->has('color')){
                $seach = [];
                $color = $request->input('color');
                foreach ($data as $k => $v) {
                    if($v->detailsgoods->color == $color){
                        $seach[] = $v->id;
                    }
                }
            $goods = Goods::whereIn('id',$seach)->paginate(8)->appends($request->input()); 
            }else if($request->has('type')){
                $seach = [];
                $type = $request->input('type');
                // dump($type);
                foreach ($data as $k => $v) {
                    if($v->detailsgoods->type == $type){
                        $seach[] = $v->id;
                    }
                }
            $goods = Goods::whereIn('id',$seach)->paginate(8)->appends($request->input());
            }else if($request->has('price')){
                $price = $request->input('price');
                $prices = explode('-', $price);
                // dump($prices);
                foreach($data as $v){
                    $seach[] = $v->id;
                }
              $goods = Goods::whereIn('id',$seach)->whereBetween('discount',[$prices])->paginate(8)->appends($request->input());  
            }else if($request->has('sort')){
                //判断两种排序方式 1为价格排序 2为上架排序
                if($request->input('sort')==1){
                     foreach($data as $v){
                    $seach[] = $v->id;
                }
              $goods = Goods::whereIn('id',$seach)->orderBy('discount','asc')->paginate(8)->appends($request->input());
                }else if($request->input('sort')==2){
                     foreach($data as $v){
                    $seach[] = $v->id;
                    }
              $goods = Goods::whereIn('id',$seach)->orderBy('created_at','asc')->paginate(8)->appends($request->input());
                }
            }else{
                 foreach($data as $v){
                    $seach[] = $v->id;
                    }
               $goods = Goods::whereIn('id',$seach)->paginate(8)->appends($request->input());
            }
        $recommend = Recommends::where('rstate','1')->take(10)->skip(3)->get();
        return view('home.goods.list',['goods'=>$goods,'recommend'=>$recommend,'dir'=>$dir,'id'=>$id]);
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
