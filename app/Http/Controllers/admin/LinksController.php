<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
//模型
use App\Models\Links;

class LinksController extends Controller
{
    /**
     * 显示友情链接列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        $search = $request -> input('search','');
        

        //查询所有数据
    
        $data = Links::where('lname','like','%'.$search.'%')->paginate(10)->appends($request->input());

        return view('admin.links.index',['data'=>$data]);
    }

    /**
     * 添加友情链接页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.links.create');
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data = $request -> except(['_token']);


        //开启事物
        DB::beginTransaction();

        //模型存储数据
        $links = new Links;
        $links -> lname = $data['lname'];
        $links -> lurl = $data['lurl'];
        $links -> lsay = $data['lsay'];
        $links -> lstate = 0;
        $res = $links -> save();

        //判断返回值
        if($res)
        {
            DB::commit();
            return redirect(url('admin/links')) -> with('success','添加成功');
        } else {
            DB::rollBack();
            return redirect() -> back() -> with('error','添加失败');
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
     * 修改单条
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $data = Links::find(Intval($id));
        


       return view('admin.links.edit',['data'=>$data]);
    }

    /**
     * 更新保存修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收数据
        $data = $request -> except(['_token']);
        

        //开启事物
        DB::beginTransaction();

        //查找用户信息
        $links =Links::find(Intval($id));
        $links -> lname = $data['lname'];
        $links -> lurl = $data['lurl'];
        $links -> lsay = $data['lsay'];
        $links -> lstate = 0;
        $res = $links -> save();

        //判断返回值
        if($res)
        {
            DB::commit();
            return redirect(url('admin/links')) -> with('success','修改成功');
        } else {
            DB::rollBack();
             return  back() -> with('error','删除失败');
        }

        
    }

    /**
     * 删除单条
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        // $links = Links::find(Intval($id));
        // $res = $links ->delete();

        $res = \App\Models\Links::destroy(Intval($id));
        if($res)
        {
            return redirect(url('admin/links')) -> with('success','删除成功');
        } else {
             return  back() -> with('error','删除失败');
        }

    }



}
