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

class GoodsController extends Controller
{
     /**
     * 公共文件上传部分.
     *
     * @return \Illuminate\Http\Response
     */
    public static function uploads(Request $request)
    {
        //添加
        // dump($data);
        if($request -> hasFile('pic')){
            // 使用request 创建文件上传对象
            $profile = $request -> file('pic');

            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();

            // 处理文件名称
            $temp_name = str_random(10);
            $filename =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());

            // 保存文件
            $profile -> move('./uploads/goods/gphoto/'.$dirname,$filename); 
            $filedir = ('/uploads/goods/gphoto/'.$dirname.'/'.$filename);
            // dd($filedir);
            return $filedir; 
        } else {
            return back() -> with('error','图片存储失败');
        }
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //设置计算数据表中所有信息的数量
        $count = DB::table('jc_goods')->whereNull('deleted_at')->count();
        $search = $request->input('search','');
        $gcid = $request->input('gcid','');
        if(empty($gcid)){
             $goods = Goods::where('name','like','%'.$search.'%')
                    ->paginate(8)
                    ->appends($request->input());
        }else{
            $goods = Goods::where('name','like','%'.$search.'%')
                    ->where('gcid',$gcid)
                    ->paginate(8)
                    ->appends($request->input());
                    

        }
       
        
        return view('admin.goods.index',['title'=>'商品列表','data'=>$goods,'cates'=>self::getcates(),'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // dump($data);
        return view('admin.goods.create',['title'=>'商品添加','data'=>self::getcates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加
        $data = $request->except('_token');
        // dump($data);
        
        $filedir = self::uploads($request);
        // dd($filedir);
        //将数据分开存入两张表中
        $goods = [
            'gcid'=>$data['gcid'],
            'name'=>$data['name'],
            'pic'=>$filedir,
            'discount'=>$data['discount'],
            'price'=>$data['price'],
            'intro'=>$data['intro'],
        ];

        $gid = DB::table('jc_goods')->insertGetId($goods);
        // dump($gid);
        $gd =[
            'gid'=>$gid,
            'type'=>$data['type'],
            'color'=>$data['color'],
            'describe'=>$data['describe'],
        ]; 
        $res = DB::table('jc_goods_details')->insert($gd);
        // dump($res);
        if($res&&$gid){
            return redirect('/admin/goods')->with('success','商品添加完成');
        }else{
             return back()->with('error','商品添加失败');
        }
    }

    /**
     * 显示价格修改弹框
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Goods::find($id);
        return view('admin.goods.price',['data'=>$data]);
    }

      /**
     * 执行价格修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pedit(Request $request)
    {
        $id = $request->input('id');
        $data = Goods::find($id);
        // dd($data);
        $data -> price = $request->input('price');
        $data -> discount = $request ->input('discount'); 
        $res = $data -> save();
         if($res){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改成功");parent.layer.close(index);</script>';
        }else{
             return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改失败");parent.layer.close(index);</script>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $goods = Goods::find($id);
        return view('admin.goods.edit',['title'=>'商品修改','data'=>self::getcates(),'goods'=>$goods]);
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
        //添加
        $data = $request->except('_token');
        // dump($data);
        if($request -> hasFile('pic')){
            $filedir = self::uploads($request);
        }else{
            $goods = Goods::find($id);
            $filedir = $goods->pic;
        }
        //将数据分开存入两张表中
        $goods = [
            'gcid'=>$data['gcid'],
            'name'=>$data['name'],
            'pic'=>$filedir,
            'discount'=>$data['discount'],
            'price'=>$data['price'],
            'intro'=>$data['intro'],
        ];

        $res1 = DB::table('jc_goods')->where('id',$id)->update($goods);
        // dump($gid);
        $gd =[
            'type'=>$data['type'],
            'color'=>$data['color'],
            'describe'=>$data['describe'],
        ]; 
        $res2 = DB::table('jc_goods_details')->where('gid',$id)->update($gd);
        // dump($res);
        if($res1||$res2){
            return redirect('/admin/goods')->with('success','商品修改完成');
        }else{
             return back()->with('error','商品修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $goods = Goods::onlyTrashed()->get();
        return view('admin.goods.del',['title'=>'商品回收站','goods'=>$goods]);
    }

    //设置软删除
    public function del($id)
    {
        //获取数据进行软删除
        $goods = Goods::find($id);

        $res = $goods -> delete();

        //判断软删除是否删除
        if($res){
            return redirect('/admin/goods')->with('success','商品删除完成');
        }else{
            return back()->with('error','商品删除失败');
        }

    }

    /**
    * 设置用户信息还原
    *
    * @param  int  $id
    */
    public function reset($id)
    {
        $res = Goods::withTrashed()->where('id','=',$id)->restore();
         if($res){
            return redirect('/admin/goods')->with('success','商品还原完成');
        }else{
            return back()->with('error','商品还原失败');
        }
    }

    //设置永久删除数据
    public function delete($id)
    {   

        //永久删除商品时删除详情
        $res1 = GoodsDetails::where('gid',$id)->delete();

        //永久删除商品同时删除商品对应的所有详细图片
        $res2 = GoodImages::where('gid',$id)->delete();

        //设置永久删除回收站中的数据
        $res = Goods::onlyTrashed()->where('id','=',$id)->forceDelete();

        //判断是否删除成功
        if(($res&&$res1)||$res2){
            return redirect('/admin/goods')->with('success','商品永久删除完成');
        }else{
            return back()->with('error','商品删除失败');
        }
    }
    //设置批量删除商品方法
    public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';
        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);
        //进行软删除
        $res = Goods::destroy($id);
        if($res){
            return redirect('/admin/goods')->with('success','商品批量删除完成');
        }else{
            return back()->with('error','商品批量删除失败');
        }
    }
}
