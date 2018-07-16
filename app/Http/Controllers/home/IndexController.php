<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Slids;
use App\Models\Recommends;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //推荐商品数据
        $recommend1 = Recommends::take(3)->skip(0)->get();
        //推荐商品数据2 跳过三条获取10条
        $recommend2 = Recommends::take(10)->skip(3)->get();
        //推荐商品数据3 跳过13条获取10条
        $recommend3 = Recommends::take(10)->skip(13)->get();
        //手机分类
        $scate = Cates::where('path','=','0,1')->get();
        //所有手机商品
        $sgood = Goods::whereIn('gcid',['2','3'])->take(8)->get();
        //获取所有智能家电商品
        $jgood = Goods::where('gcid','18')->take(8)->get();
       
        //获取平板笔记本的所有商品
        $pgood = Goods::where('gcid','14')->take(8)->get();
        //获取小米生活方式的所有商品
        $shgood = Goods::where('gcid','16')->take(8)->get();
         // dump($shgood);
        //轮播数据
        $slids = Slids::where('state','1')->get();
        // 分类数据
        $cates = Cates::where('path','!=','0')->get();
        return view('home.index.index',
            [
                    'cates'=>$cates,
                    'scate'=>$scate,
                    'sgood'=>$sgood,
                    'jgood'=>$jgood,
                    'pgood'=>$pgood,
                    'shgood'=>$shgood,
                    'slids'=>$slids,
                    'recommend1'=>$recommend1,
                    'recommend2'=>$recommend2,
                    'recommend3'=>$recommend3,
            ]);
    }

    /**
     * 商品分类列表页面
     *
     * 
     */
    public function goodlist($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gooddetails($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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
