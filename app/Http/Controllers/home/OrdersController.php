<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Goods;
use DB;
use App\Models\Address;
use App\Models\Entrepots;
use App\Models\ShopCars;
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
        //检测用户是否登陆
        
        if(session('homeflag') == true){
            //已经登陆进入区间
            $user_id = session('homeuser.id'); //已经登陆的用户id
            //$shops = session('goods');
            $shops = ShopCars::where('uid','=',$user_id)->get();
            // dump($shops);
     
            //个人的收货地址
            $address = Address::where('uid','=',$user_id)->get();
            // dump($address);
            return view('home.orders.orderCreate',['address'=>$address,'shops'=>$shops]);     
        }else{
            //没有登陆跳转登陆页面
           return redirect('/home/login/index')-> with('success','您还没有登陆');
        }
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

    //修改地址
    public function siteEdit($id)
    {
        //查找当前要修改的地址信息
        $address = Address::where('id','=',$id)->first();
        // dump($address);

        return view('home.orders.siteEdit',['address'=>$address]);
    }


    //保存修改地址
    public function siteUpdate(Request $request,$id)
    {
        $req = $request->except(['_token']);
        $has = $request->has(['name','phone','address','postcode','s_xj']); 

        $address = Address::where('id','=',$id)->first();
        $address -> name = $req['name'];
        $address -> phone = $req['phone'];
        $address -> address = $req['s_sf'].$req['s_sq'].$req['s_xj'].$req['address'];
        $address -> postcode = $req['postcode'];
        $address -> label = $req['label'];
        $res = $address->save();

        if($res){
            return redirect('/home/orders/ordercreate')-> with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
    

    //删除地址
    public function siteDelete($id)
    {
        $res3 = Address::where('uid','=',session('homeuser.id'))->where('id','=',$id)->delete();
        if($res3){
           return redirect('/home/orders/ordercreate')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }

    //提交订单 扣减库存 跳转支付页面
    public function siteSubmit(Request $request)
    {   
        //页面传过来用户id 和 地址的id
         $data = $request -> only(['uid','addid']);//过
         //收件人信息编辑
         $address = Address::where('uid','=',$data['uid'])->where('id','=',$data['addid'])->first();//过
                  
         $recipients = $address['name'];
         $phone = $address['phone'];
         $address_dz = $address['address'];

         //订单名称的编辑
         //随机数方法
         function generate_code($length = 6) {
            return rand(pow(10,($length-1)), pow(10,$length)-1);
        }
         $temp_name = generate_code(6);
         $dirname = date('Ymd',time());
         // echo ($dirname);
         $ordersnum = "$dirname$temp_name";
         //session 拿数据
        // $shops = session('goods');
        // $shops_del = ShopCars::where('id','=',33) -> get();
        // $res3 = ShopCars::where('uid','=',$data['uid'])->where('id','=',34)->delete();
        //dump($shops_del);

         //拿取当前登录用户的购物车订单
         $shops = ShopCars::where('uid','=',$data['uid'])->get();

         foreach ($shops as $key => $value) {
    
             //添加到发货表
             $orders = new Orders;
             $orders -> ordersnum = $ordersnum; //商品订单号 //过
             $orders -> gid = $value['gid']; //商品          //暂过
             $orders -> uid = $data['uid']; //下单用户      //暂过
             $orders -> recipients = $recipients; //收件人 //过
             $orders -> phone = $phone; //收件人手机号     //过
             $orders -> address = $address_dz; //收货地址  //过
             $orders -> num = $value['gnum']; //商品数量   //暂过
             $orders -> total =  (($value['gprice'])*($value['gnum'])); //该订单的商品金额  //暂过
             $orders -> status = 0; //当前的发货状态
             $res1 = $orders -> save();

             //减掉库存中的数量[根据商品的id找到库存数量减掉]
            $entrepots = Entrepots::where('gid','=',$value['gid'])->first();
            $entrepots_num = ($entrepots['num'] - $value['gnum']);
            $entrepots -> num = $entrepots_num;
            $res2 = $entrepots ->save();

           
            //重新赋值给变量
             $ordersnum = $ordersnum;
            // $orders_aaa = Orders::where('ordersnum','=',$ordersnum)->get();
            // // dump($orders_aaa);
            // $ordersnum = $orders_aaa['ordersnum'];

            //成功后移除购物车表属于
            $res3 = ShopCars::where('uid','=',$data['uid'])->where('id','=',$value['id'])->delete();

            if($res1 == false || $res2 == false){
                echo 0;
            }
         }

         
         //dump("$ordersnum");
         //处理结果返回值
         if($res1 || $res2){
            //将订单号返回
            echo $ordersnum;
         }else{
            echo 0;
         }   
    }


    //支付成功 正式扣除库存  否则还原库存
    public function submitOk($ordsum)
    {   
        //去除购物车在session 中的数据
         session(['goods'=>null]);

         //查询订单信息投放到成功页面
          $orders = Orders::where('ordersnum','=',$ordsum)->first();
  
          $orders_all = Orders::where('ordersnum','=',$ordsum)->get();
          //dump($orders_all);
          //订单金额
          $moneys = DB::table('jc_orders') -> where('ordersnum','=',$ordsum)->sum('total');
          // dump($moneys);

        return view('home.orders.submitOk',['orders'=>$orders,'orders_all'=>$orders_all,'moneys'=>$moneys]);
    }
}
