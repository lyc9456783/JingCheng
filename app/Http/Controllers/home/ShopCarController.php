<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\ShopCars;

class ShopCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $good_car = session('goods');
        $uid = session('homeuser')['id'];
        $zsum = 0;
        $shops = session('goods')?session('goods'):null;
        if(session('homeflag')){
            if($shops){
                $uid = session('homeuser')['id'];
                $good_car = $request->session()->pull('goods');
                foreach ($good_car as $k => $v) {
                    $shops = new Shopcars;
                    $shops -> uid = $uid;
                    $shops -> gid = $v['id'];
                    $shops -> gname = $v['info']->name;
                    $shops -> gnum = $v['num'];
                    $shops -> gprice = $v['info']->discount;
                    $shops -> gcolor = $v['color'];
                    $shops -> gcolor = $v['info']->pic;
                    $shops -> gtype = $v['info']->detailsgoods->type;
                    $shops -> save();   
                }
            }
            $shops = ShopCars::where('uid',$uid)->get();
            // dump($shops);
        }
        //将商品的个数存入session
        return view('home.goods.shopcar')->with(['shops'=>$shops,'zsum'=>$zsum]);
    }

    /**
     * 商品添加购物车
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        if(session('homeflag')){
            $uid = session('homeuser')['id'];
            $good_car = ShopCars::where('gid',$data['id'])->where('uid',$uid)->first(); 
            if($good_car){
                $good_car -> gnum = ($good_car->gnum + $data['num']);
                $good_car -> save();
                echo 1;
            }else{
                $uid = session('homeuser')['id'];
                $goods = Goods::where('id',$data['id'])->first();
                $shopcar = new ShopCars;
                $shopcar -> uid = $uid;
                $shopcar -> gid = $data['id'];
                $shopcar -> gname = $goods['name'];
                $shopcar -> gnum = $data['num'];
                $shopcar -> gprice = $goods['discount'];
                $shopcar -> gpic = $goods['pic'];
                $shopcar -> gcolor = $goods ->detailsgoods['color'];
                $shopcar -> gtype = $goods ->detailsgoods['type'];
                $shopcar -> save();
                echo 1;  
            }
           

        }else{

            $goods = session('goods')?session('goods'):array();
            $a = 0;
            if($goods){
                foreach ($goods as $key => &$value) {
                    if($value['id'] == $data['id']){
                        $value['num'] = $value['num']+$data['num'];
                        $value['xsum'] = $value['num']*($value['info']->discount);
                        $a = 1;
                    }
                } 
            }
            //使用标记位判断是否存在
            if(!$a){
                $good = Goods::where('id',$data['id'])->first();
                $goods[] = [ 
                'id'  => $data['id'],
                'num' => $data['num'],
                'info'=> $good,
                'color'=> $good->detailsgoods['color'],
                'xsum' => $data['num']*($good->discount),
                ]; 
            }  
            //得到的值存入session中
            session(['goods'=>$goods]);
            echo 1;
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcar(Request $request)
    {   
        $id = $request->input('id');
        if(session('homeflag')){
            $uid = session('homeuser')['id'];
            $shops = ShopCars::where('gid',$id)->where('uid',$uid)->first();
            $shops -> gnum = ++$shops->gnum;
            $shops -> save();
            echo 1;
        }else{

            $shops = session('goods');
            // dump($shops);
            foreach ($shops as $key => &$value) {
                if($value['id']==$id){
                    $value['num'] = ++$value['num'];
                }
            }
            $request->session()->put('goods',$shops);
            echo 1;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function minuscar(Request $request)
    {
        $id = $request->input('id');
        if(session('homeflag')){
            $uid = session('homeuser')['id'];
            $shops = ShopCars::where('gid',$id)->where('uid',$uid)->first();
            // dump($shops);
            $shops ->gnum = --$shops->gnum;
            $shops -> save();
            echo 1;
        }else{
            
            $shops = session('goods');
            // dump($shops);
            foreach ($shops as $key => &$value) {
                if($value['id']==$id){
                    $value['num'] = --$value['num'];
                }
            }

            $request->session()->put('goods',$shops);
            echo 1;  
        }
 
    }

    /**
     * ajax移除购物车
     *
     */
    public function delcar(Request $request)
    {
        $id = $request->input('id');
        if(session('homeflag')){
            $uid = session('homeuser')['id'];
            $res = ShopCars::where('gid',$id)->where('uid',$uid)->delete();
            if($res){
                echo 1;
            }
        }else{
             $shops = session('goods');
            // dump($shops);
            foreach ($shops as $key => $value) {
                if($value['id']==$id){
                    //释放session
                    unset($shops[$key]);
                }
            }
            //写入session
            $request->session()->put('goods',$shops);
            if(empty(session('goods'))){
               $request->session()->put('goods',null); 
            }
            echo 1;
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delallcar(Request $request)
    {
        if(session('homeflag')){
            $uid = session('homeuser')['id'];
            $res = ShopCars::where('uid',$uid)->delete();
            if($res){
                return redirect('/home/goods/shopcar')->with('success','清空购物车成功'); 
            }
        }else{
            $shops = session('goods');
            unset($shops);
            $request->session()->put('goods',null);
            return redirect('/home/goods/shopcar')->with('success','清空购物车成功'); 
        }
  
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
