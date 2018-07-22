<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Goods;
use DB;
use App\Models\Address;
class OrdersController extends Controller
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
        // dump($data);
        //查询当前登录用户的订单
        $orders = Orders::where('uid',$uid)->get();

        //查询当前用户的订单总数
        $count = DB::table('jc_orders')->where('uid',$uid)->count();
        // dump($orders);
        //加载模板
        return view('home.orders.index',['data'=>$data,'orders'=>$orders,'count'=>$count]);
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
        //设置更新用户订单的收货信息
        $data = $request -> all();

        //通过ID查询数据库中的信息进行修改更新
        $orders = Orders::where('id',$id)->first();
        $orders -> recipients = $data['recipients'];
        $orders -> address = $data['address'];
        $orders -> phone = $data['phone'];
        $res = $orders -> save();

        //判断信息是否修改成功
        if ($res == true) {
            return redirect('/home/orders/show/'.$id)-> with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //接受id查询用户订单详情
        $data = Orders::where('id',$id)->first();
        
        //获得商品的ID号
        $gid = $data['gid'];

        //查询商品详情
        $goods = Goods::where('id',$gid)->get();

        //加载模板分配数据
        return view('home.orders.show',['data'=>$data,'goods'=>$goods]);
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
        //当用户单击删除订单后,会把id传过来,利用id进行删除订单
        $orders = Orders::where('id',$id)->first();
        
        //进行删除数据
        $res = DB::table('jc_orders')->where('id',$id)->delete();
        //判断用户是否删除成功
        if($res){
            return redirect('/home/orders/index')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
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




    //李银昌
    //购物车之后 生成订单页面
    public function orderCreate(){

        //个人的收货地址
        $address = Address::where('uid','=',21)->get();
        // dump($address);
        return view('home.orders.orderCreate',['address'=>$address]);
    }

    //添加地址
    public function createSite(){
        return view('home.orders.createSite');
    }

    //保存收货地址
    public function siteStore(Request $request,$id)
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
                return redirect('/home/orders/ordercreate')-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','请补全所有内容');
        }
    }

    //提交订单 扣减库存 跳转支付页面
    public function siteSubmit()
    {
        


        
    }

    //支付成功 正式扣除库存  否则还原库存
    public function submitOk()
    {
        return view('home.orders.submitOk');
    }
}
