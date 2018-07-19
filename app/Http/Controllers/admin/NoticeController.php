<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Notice;
use DB;

class NoticeController extends Controller
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

        //查询数据进行页面显示
        $data = Notice::where('id','like','%'.$search.'%')->paginate(3)->appends($request->input());
        // dd($data);

         //设置计算数据表中所有信息的数量
        $count = DB::table('jc_notice')->whereNull('deleted_at')->count();
        //设置页面显示
        return view('admin.notice.index',['title'=>'商城公告列表','data'=>$data,'count'=>$count]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //查询用户表中的数据
        $users = Users::all();

        //设置商城公告的添加
        return view('admin.notice.create',['users'=>$users,'title'=>'添加商城公告']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        
        //接受表单传过来的公告内容
        $notice = new Notice;
        $notice -> uid = $data['uid'];
        $notice -> title = $data['title'];
        $notice -> details = $data['details'];
        $res = $notice -> save();
        
        //判断添加公告是否成功
        if ($res) {
            return redirect('/admin/notice/index')-> with('success','添加成功');
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
        //查询订单信息分配到模板中
        $data = Notice::find($id);
        // dd($data);
        //分配数据到模板中
        return view('admin/notice/edit',['data'=>$data,'title'=>'公告修改']);
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
        
        //将修改完成的数据覆盖添加到数据库
        $notice = Notice::find($id);
        $notice -> title = $data['title'];
        $notice -> details = $data['details'];
        $res = $notice -> save();

        //判断添加订单是否成功
        if ($res) {
            return redirect('/admin/notice/index')-> with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }


    //设置软删除数据
    public function del($id)
    {
        //获取数据进行软删除
        $notice = Notice::find($id);

        $res = $notice -> delete();

        //判断软删除是否删除
        if ($res == true) {
            return redirect('/admin/notice/destroy')-> with('success','删除成功');
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
        $res = Notice::withTrashed()->where('id','=',$id)->restore();

        //判断恢复是否成功
        if ($res == 1) {
            return redirect('/admin/notice/index')-> with('success','还原成功');
        }else{
            return back()->with('error','还原失败');
        }
    }


    //设置永久删除数据
    public function delete($id)
    {   
        //设置永久删除回收站中的数据
        $res = Notice::onlyTrashed()->where('id','=',$id)->forceDelete();

        //判断软删除是否删除
        if ($res) {
            return redirect('/admin/notice/index')-> with('success','删除成功');
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
        $data = Notice::onlyTrashed()->paginate(3)->appends($request->input());

        //分配数据到模板
        return view('admin.notice.delete',['data'=>$data,'title'=>'公告回收站']);
    }
}
