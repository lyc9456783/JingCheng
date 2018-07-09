<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatesRequest;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{

    /**
     * 公共拼接名称
     */
    public static function getcates()
    {
        $cates = Cates::select('id','pid','classname','path','status',DB::raw("concat(id,',',path) as paths"))->orderBy('paths','asc')->paginate(2);
        foreach($cates as $k=>$v){
            //统计逗号出现的次数
            $i = substr_count($v->path,',');
            //拼接|--
            $v->classname = str_repeat('|----',$i).$v->classname;
        }
        return $cates;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($cates);
        if($request->has('search')){
            $search = $request->input('search');

            $cates = Cates::where('classname','like','%'.$search.'%')->paginate(2)->appends($request->input());
            // dump($cates);
            return view('admin.cates.index',['title'=>'分类列表','cates'=>$cates]);
        }else{
            return view('admin.cates.index',['title'=>'分类列表','cates'=>self::getcates()]); 
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cates.create',['title'=>'添加分类','cates'=>self::getcates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatesRequest $request)
    {
        //将数据存入数据库中
        $cates = new Cates;
        $pid = $request->input('pid','');
        if($pid == 0){
            $cates -> path = 0;
        }else{
            $p_data = Cates::find($pid);
            $cates -> path = $p_data->path.','.$p_data->id;
        }
        $cates-> pid = $pid;
        $cates-> classname = $request->input('classname');
        $res = $cates->save();
        if ($res) {
            return redirect('/admin/cates')-> with('success','添加成功');
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
        $data = Cates::find($id);
        return  view('admin.cates.edit',['title'=>'分类修改','cates'=>self::getcates(),'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatesRequest $request,$id)
    {
       //将数据存入数据库中
        $cates = Cates::find($id);
        $pid = $request->input('pid','');
        if($pid == 0){
            $cates -> path = 0;
        }else{
            $p_data = Cates::find($pid);
            $cates -> path = $p_data->path.','.$p_data->id;
        }
        $cates-> pid = $pid;
        $cates-> classname = $request->input('classname');
        $res = $cates->save();
        if ($res) {
            return redirect('/admin/cates')-> with('success','修改成功');
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
        $data = Cates::where('pid',$id)->first();
        if(empty($data)){
             $res = Cates::destroy($id);
                if ($res) {
                    return redirect('/admin/cates')-> with('success','删除成功');
                }else{
                    return back()->with('error','删除失败');
                }
                
        }else{
              return back()->with('error','分类不为空不允许删除');
        }

    }

    /**
     * 获取软删除的分类
     */
    public function getdel()
    {
        $datas = Cates::onlyTrashed()->get();
        // dump($datas);
        return view('admin.cates.recycle',['title'=>'分类回收站','datas'=>$datas]);
    }


    /**
     * 还原删除的分类
     */
    public function reset($id)
    {
        $res = Cates::withTrashed()->where('id', $id)->restore(); 
         if($res){
            return redirect('/admin/cates')->with('success','还原成功！！');
        }else{
            return back()->with('error','还原失败！！');
        }
    }

    /**
     * 永久删除分类
     */
    public function delete($id)
    {
        $res = Cates::onlyTrashed()->where('id',$id)->forceDelete();
          if($res){
            return redirect('/admin/cates')->with('success','永久删除成功！！');
        }else{
            return back()->with('error','永久删除失败！！');
        }
    }
}
