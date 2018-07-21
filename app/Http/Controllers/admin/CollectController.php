<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Collect;
use App\Models\Goods;
use DB;
use App\Models\Cates;
class CollectController extends Controller
{

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
        $id = $request -> input('search');
        if($id){
            $data = Collect::where('uid',$id)->paginate(4)->appends($request->input());
        }else{
            $data = Collect::paginate(4)->appends($request->input());
        }
        $collect = Collect::all();
        return view('admin.collect.index',['title'=>'商品收藏列表','data'=>$data,'collect'=>$collect]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //判断是否是ajax发送过来的请求
        if($request ->ajax()){
            $gcid = $request->input('gcid','');
            // dump($gcid);
            $goods = Goods::where('gcid',$gcid)->get();
            echo  json_encode($goods);
            return;
        }
        $users = Users::all();
        $data = Collect::all();
        return view('admin.collect.create',['title'=>'添加收藏','users'=>$users,'$data'=>$data,'cates'=>self::getcates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $req = $request -> has('gid','uid');
        if($req){
            $collect = new Collect;
            $collect -> gid = $data['gid'];
            $collect -> uid = $data['uid'];
            $res = $collect -> save();
            if($res){
                return redirect('admin/collect')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','请选择用户和需要收藏商品');
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
        $collect = Collect::find($id);
        $res = $collect -> delete();
        if($res){
            return redirect('admin/collect')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }



    //批量删除
   public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';


        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);


        //进行软删除
        $res = Collect::destroy($id);
        if($res){
            return redirect('admin/collect')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }


    }
}
