<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\GoodsDetails;
use App\Models\GoodImages;
use App\Models\Discount;
class DiscountsController extends Controller
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
        $data = Discount::where('gname','like','%'.$search.'%')->paginate(8)->appends($request->input());
        // dd($data);

        //查询订单表中的数据总数量
        $count = DB::table('js_discounts')->whereNull('deleted_at')->count();

        //加载模板对数据进行展示
        return view('admin.discounts.index',['data'=>$data,'count'=>$count,'title'=>'商品折扣列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //加载折扣商品添加列表
        return view('admin.discounts.create',['title'=>'添加折扣商品','data'=>self::getcates()]);
    }


     /**
     * 公共分类拼接部分.
     *
     * @return \Illuminate\Http\Response
     */
     public static function getcates()
     {
        $data = Cates::where('path','!=','0')->get();
        // dd($data);
        foreach($data as $k=>$v){
            //统计逗号出现的次数
            $i = substr_count($v->path,',');
            //拼接|--
            $v->classname = str_repeat('|----',$i).$v->classname;
        }
        return $data;
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接受数据
        $data = $request -> all();
      
        //查询商品现价
        $gid = $data['gid'];
        $describe = $data['describe'];

        //获取原价格
        $goods = Goods::where('id',$gid)->first();
        $price = $goods['price'];
        $gname = $goods['name'];
       
        if($describe == 1){
            $discount = $price/2;
            
        }elseif($describe == 2){
            $discount = $price-1000;
            
        }elseif($describe == 3){
            $discount = $price-500;
            
        }elseif($describe == 4){
            $discount = $price-300;
            
        }elseif($describe == 5){
            $discount = $price-200;
           
        }else{
             $discount = $price-100;
        }
       

        $discounts = new Discount;
        $discounts -> gid = $gid;
        $discounts -> price = $price;
        $discounts -> gname = $gname;
        $discounts -> describe = $describe;
        $discounts -> discount = $discount;
        $res = $discounts -> save();
        

        //判断修改商品折扣价格是否成功
        if ($res == true) {
            return redirect('/admin/discounts/index')-> with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        //接受ID查询后放入到模板中进行显示
        $data = Discount::where('id',$id)->first();
        // dd($data);

        return view('admin.discounts.edit',['data'=>$data,'title'=>'商品折扣修改']);
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
        //接受数据进行修改
        $data = $request -> all();
        // dd($data);

        $describe = $data['describe'];
        $discount = $data['discount'];
        $price = $data['price'];
        if($describe == 1){
            $discount = $price/2;
            
        }elseif($describe == 2){
            $discount = $price-1000;
            
        }elseif($describe == 3){
            $discount = $price-500;
            
        }elseif($describe == 4){
            $discount = $price-300;
            
        }elseif($describe == 5){
            $discount = $price-200;
           
        }else{
             $discount = $price-100;
        }

        $discounts = Discount::find($id);
        $discounts -> price = $data['price'];
        $discounts -> gname = $data['gname'];
        $discounts -> describe = $describe;
        $discounts -> discount = $discount;
        $res2 = $discounts -> save();
        

        //判断修改商品折扣价格是否成功
        if ($res2 == true) {
            return redirect('/admin/discounts/index')-> with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //接受id进行删除
        $res = DB::table('js_discounts')->where('id',$id)->delete();

        //判断是否删除成功
        if ($res == true) {
            return redirect('/admin/discounts/index')-> with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
