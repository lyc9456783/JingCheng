<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Citys;
use DB;

class CitysController extends Controller
{
    /**
     *共用代码提出
     * 
     */
    public static function getCitys(){

        //方式一  $data = DB::select("select id,cname,pid,path,concat(path,',',id) as path from citys");
        //方式二
        $data = Citys::select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))
                        ->orderBy('paths','asc')->paginate(10);

        //统计字符出现的次数
        foreach($data as $k => $v){
            $n = substr_count($v->path,',');
            $data[$k] -> cname = str_repeat('|-----',$n).$data[$k]->cname;
        }
        return $data;
    }


    /**
     * 显示列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //视图
       return view('admin.citys.index',['data'=>self::getCitys()]);
    }

    /**
     * 添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //视图
        return view('admin.citys.create',['data'=>self::getCitys()]);
    }

    /**
     * 保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citys = new Citys;

        //检测顶级分类
        $pid = $request -> input('pid','');
        if($pid == 0){
            //顶级分类
            $citys -> path = '0';
        }else{
            //非顶级分类,查找父级
            $parent_data = Citys::find($pid);
            //(存储path字段) = (分级的path字段)拼上(分级的id字段)
            $citys -> path = $parent_data -> path.','.$parent_data ->id; 
        }

      
        $citys -> cname = $request -> input('cname','');
        $citys -> pid =$pid;

        //返回值
        if($citys ->save()){
            return redirect('/admin/citys') -> with('success','成功');
        }else{
            return back() -> with('error','失败');
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
        //
    }
}
