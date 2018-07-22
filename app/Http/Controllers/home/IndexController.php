<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Slids;
use App\Models\Recommends;
use App\Models\Notice;
use App\Models\Links;

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
        //商城公告数据
        $notices = Notice::orderBy('created_at','desc')->take(9)->get();
        //友情链接数据
        $links = links::where('lstate','1')->get();
        // dump($links);
        return view('home.index.index',
            [
                    'cates'=>$cates,
                    'scate'=>$scate,
                    'sgood'=>$sgood,
                    'jgood'=>$jgood,
                    'pgood'=>$pgood,
                    'shgood'=>$shgood,
                    'slids'=>$slids,
                    'notices'=>$notices,
                    'links'=>$links,
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
    public function searchs(Request $request)
    {
        if($request->has('search')){
            $search = $request->input('search');
            $goods = Goods::where('name','like','%'.$search.'%')->paginate(8)->appends($request->input());
            $recommend = Recommends::where('rstate','1')->take(10)->skip(3)->get();
            return view('home.goods.list',['goods'=>$goods,'id'=>0,'dir'=>'搜索','recommend'=>$recommend]);
        }
    }


    /**
     * 商城公告列表页
     *
     * 
     */
    public function noticelist(Request $request)
    {
        if($request->has('search')){
            $_GET['page'] = empty($_GET['page'])?1:$_GET['page'];
            $search = $request->input('search');
            // dump($search);
            $notices = Notice::where('title','like','%'.$search.'%')->paginate(5);
            
        }else{
              //商城公告数据
        $notices = Notice::orderBy('created_at','desc')
                ->paginate(5)
                ->appends($request->input());
        }
      
        return view('home.notice.list',['notices'=>$notices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function noticedetail($id)
    {
        $detail = Notice::find($id);
        return view('home.notice.detail',['detail'=>$detail]); 
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
