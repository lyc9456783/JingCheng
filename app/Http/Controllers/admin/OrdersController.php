<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Users;
use App\Models\Goods;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取请求的参数,也就是说需要搜索额参数
        $search = $request -> input('search',''); 
        
        //获取订单表中的信息查询
        $data = Orders::where('id','like','%'.$search.'%')->paginate(8)->appends($request->input());
        // dd($data);

        //查询订单表中的数据总数量
        $count = DB::table('jc_orders')->whereNull('deleted_at')->count();

        //加载显示订单列表
        return view('admin/orders/index',['data'=>$data,'title'=>'订单列表','count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //查询所有用户
        $users = Users::all();
        // dd($users);

        //显示订单添加页面
        return view('admin.orders.create',['title'=>'订单添加','users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取上传的订单信息
        $data = $request -> all();
        // dump($data);
        //获取添加订单的商品ID
        $gid = $data['gid'];

        //查询商品表中对应的购买商品id的价格
        $goods = Goods::where('id',$gid)->first();

        //计算商品总价
        $num = (($goods['discount'])*($data['num']));
        // dd($num);
        //生成订单号
        $time= date('YmdHis',time());

        //获取市级
        $sj = $data['s_sf'];
        $sq = $data['s_sq'];
        $xj = $data['s_xj'];
        $jt = $data['address'];
        //拼接收货地址
        $address = $sj.$sq.$xj.$jt;
        
        //查询商品表中有没有添加的商品ID
        $res1= Goods::find($data['gid']);
        
        //判断商品中有没有要添加具体商品
        if(!empty($res1))
        {
            //对得到的用户订单进行添加到数据库
            $orders = new Orders;
            $orders -> uid = $data['uid'];
            $orders -> gid = $data['gid'];
            $orders -> ordersnum = $time;
            $orders -> recipients = $data['recipients'];
            $orders -> phone = $data['phone'];
            $orders -> address = $address;
            $orders -> num = $data['num'];
            $orders -> total = $num;
            $orders -> status = $data['status'];
            $res2 = $orders -> save();

            //判断添加订单是否成功
            if ($res2) {
                return redirect('/admin/orders/index')-> with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }

       }else{
            return back()->with('error','请核对商品ID');
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
        //获取订单表中的信息查询
        $data = Orders::find($id);
        // dd($data);
        //显示订单详情的页面
        return view('admin.orders.show',['data'=>$data,'title'=>'订单详情']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询订单信息分配到模板中
        $data = Orders::find($id);
        // dd($data);
        //分配数据到模板中
        return view('admin/orders/edit',['data'=>$data,'title'=>'订单修改']);

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
        //获取数据进行存到数据库
        $data = $request -> all();
        // dump($data);
        $orders = Orders::find($id);
        $orders -> recipients = $data['recipients'];
        $orders -> gid = $data['gid'];
        $orders -> num = $data['num'];
        $orders -> address = $data['address'];
        $orders -> phone = $data['phone'];
        $res = $orders -> save();

        //判断添加订单是否成功
        if ($res) {
            return redirect('/admin/orders/index')-> with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    //设置订单发货设置
    public function fh(Request $request, $id)
    {
        $orders = Orders::find($id);
        $orders -> status = 1;
        $res = $orders -> save();

        //判断添加订单是否成功
        if ($res) {
            return redirect('/admin/orders/index')-> with('success','订单已发货');
        }else{
            return back()->with('error','库存商品不足');
        }
    }


    //设置软删除数据
    public function del($id)
    {
        //获取数据进行软删除
        $orders = Orders::find($id);

        $res = $orders -> delete();

        //判断软删除是否删除
        if ($res == true) {
            return redirect('/admin/orders/destroy')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


    /**
     * 设置用户信息还原
     *
     * @param  int  $id
     */
    public function reset($id)
    {
        //还原软删除的数据
        $res = Orders::withTrashed()->where('id','=',$id)->restore();

        //判断恢复是否成功
        if ($res == 1) {
            return redirect('/admin/orders/index')-> with('success','还原成功');
        }else{
            return back()->with('error','还原失败');
        }
    }


    //设置永久删除数据
    public function delete($id)
    {   
        //设置永久删除回收站中的数据
        $res = Orders::onlyTrashed()->where('id','=',$id)->forceDelete();

        //判断软删除是否删除
        if ($res) {
            return redirect('/admin/orders/index')-> with('success','删除成功');
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
    public function destroy(Request $request)
    {
        //获取被软删除用户的数据
        $data = orders::onlyTrashed()->paginate(3)->appends($request->input());


        //分配数据到模板
        return view('admin.orders.delete',['data'=>$data,'title'=>'订单回收站']);
    }
}
