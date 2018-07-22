<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods;

class ShopCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $zsum = 0;
        $shops = session('goods')?session('goods'):null;
        if(session('homeflag')){
            if($shops){
                
            }
        }
        // dump($shops);
        if($shops){
            foreach ($shops as $key => $value) {
                $zsum += $value['xsum'];
            }
        }
        //将商品的个数存入session
        //将商品总价 存入session
        $request->session()->put('carcount',count($shops));
        $request->session()->put('carzsum',$zsum);
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
        // dd($data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcar(Request $request)
    {
        $id = $request->input('id');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function minuscar(Request $request)
    {
        $id = $request->input('id');
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

    /**
     * ajax移除购物车
     *
     */
    public function delcar(Request $request)
    {
        $id = $request->input('id');
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
        echo 1;
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
        $shops = session('goods');
            unset($shops);
        $request->session()->put('goods',null);
        return redirect('/home/goods/shopcar')->with('success','清空购物车成功');
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
