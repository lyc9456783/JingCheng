<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entrepots;
use App\Models\Goods;
use App\Models\Cates;
use DB;
class EntrepotController extends Controller
{
    //分类名
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
         $req = $request -> input('search','');
            $data = DB::table('jc_entrepots as e')
                ->join('jc_goods as g','e.gid','=','g.id')
                ->where('g.name','like','%'.$req.'%')
                ->select('e.id','g.name','e.num','e.flag')
                ->paginate(5)->appends($request->input());
                // dump($data);
        //获取库存所有数据
        // $data = Entrepots::all();
        return view('admin.entrepots.index',['title'=>'库存列表','data'=>$data,'req'=>$req]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $data = Goods::all();
        return view('admin.entrepots.create',['title'=>'添加库存','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加库存
    public function store(Request $request)
    {
        //判断数据是否上传
        $res = $request -> except(['_token']);
        // 如果上传则执行第一个，不上传则执行第二个
        if($res['gid'] == '0'){
            return back()->with('error','请选择商品');
        }

        if($res['flag'] == '1'){
            //获取除了token以外所有上传的数据
            // $req = $request -> except(['_token']);
            //执行添加数据
            if($res['num'] < '0'){
                return back()->with('error','库存数量不得少于0');
            }else{
                $entrepots = new Entrepots;
                $entrepots -> gid = $res['gid'];
                $entrepots -> num = $res['num'];
                $entrepots -> flag = '1';
                $res = $entrepots -> save();
            }
            
        }else{
            //获取除了token以外所有上传的数据
                //执行添加数据
            if($res['num'] < '0'){
                return back()->with('error','库存数量不得少于0');
            }else{
                $entrepots = new Entrepots;
                $entrepots -> gid = $res['gid'];
                $entrepots -> num = $res['num'];
                $entrepots -> flag = '0';
                $res = $entrepots -> save();
            }
        }
        if($res){
            // 如果添加成功则执行
            return redirect('admin/entrepot')->with('success','添加成功');
        }else{
            // 添加不成功则执行
            return back()->with('error','添加失败');
        }
        // dump($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //执行上下架功能
        $data = Entrepots::find($id);
        if($data->flag == '0'){
            $data -> flag = '1';
            $data -> save();
            return back()->with('success','上架成功');
        }else{
            $data -> flag = '0';
            $res = $data -> save();
            return back()->with('success','下架成功');
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
        $data = Entrepots::find($id);
        $goods = Goods::all();
        // dump($data);
        return view('admin.entrepots.edit',['title'=>'修改库存','goods'=>$goods,'data'=>$data]);
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
        $req = $request -> has('flag');
        //如果上传则执行第一个，不上传则执行第二个
        //获取除了token以外所有上传的数据
        $res = $request -> except(['_token']);
        if($req){

            if($res['num'] < '0'){
                return back()->with('error','库存数量不得少于0');
            }else{
                //执行修改数据
                $entrepots = Entrepots::find($id);
                $entrepots -> num = $res['num'];
                $entrepots -> flag = '1';
                $res = $entrepots -> save();
            }
        }else{

            if($res['num'] < '0'){
                return back()->with('error','库存数量不得少于0');
            }else{
            //执行修改数据
                $entrepots = Entrepots::find($id);
                $entrepots -> num = $res['num'];
                $entrepots -> flag = '0';
                $res = $entrepots -> save();
            }
        }
        if($res){
            // 如果添加成功则执行
            return redirect('admin/entrepot')->with('success','修改成功');
        }else{
            // 添加不成功则执行
            return back()->with('error','修改失败');
        }
        // dump($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        $data = Entrepots::find($id);
        $res = $data -> delete();
        if($res){
             // 如果添加成功则执行
            return redirect('admin/entrepot')->with('success','删除成功');
        }else{
            // 添加不成功则执行
            return back()->with('error','删除失败');
        }
    }

    //批量删除
    public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';


        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);


        //进行删除
        $res = Entrepots::destroy($id);
        if($res){
            return redirect('admin/recommend')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }


    }
    
}
