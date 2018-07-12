<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
//模型
use App\Models\Links;
use App\Http\Requests\LinksInsertRequest;

class LinksController extends Controller
{
    /**
     * 显示友情链接列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //搜索
        $search = $request -> input('search','');

       
        $search = $request -> input('search','');
        

        //查询所有数据
    
        $data = Links::where('lname','like','%'.$search.'%')->paginate(10)->appends($request->input());
        //数据查询 搜索 分页
        $data = Links::where('lname','like','%'.$search.'%')->paginate(5)->appends($request->input());


        //返回页面
        return view('admin.links.index',['data'=>$data]);
    }


    /**
     * 添加友情链接页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回页面
        return view('admin.links.create');
    }


    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinksInsertRequest $request)
    {

        //接收数据
        $data = $request -> except(['_token']);

        //模型存储
        $links = new Links;
        $links -> lname = $data['lname'];
        $links -> lurl = $data['lurl'];
        $links -> lsay = $data['lsay'];
        $links -> lstate = 0;
        $res = $links -> save();

        //判断返回值
        if($res){
            return redirect(url('admin/links')) -> with('success','添加成功');
        } else {
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
     * 修改单个
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $data = Links::find(Intval($id));
        
        //返回页面
       return view('admin.links.edit',['data'=>$data]);
    }

    /**
     * 修改保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收数据
        $data = $request -> except(['_token']);

        //查找 $id 用户信息
        $links =Links::find(Intval($id));
        $links -> lname = $data['lname'];
        $links -> lurl = $data['lurl'];
        $links -> lsay = $data['lsay'];
        $links -> lstate = 0;
        $res = $links -> save();

        //判断返回值
        if($res){
            return redirect(url('admin/links')) -> with('success','修改成功');
        } else {
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

        //删除单表id信息
        $res = \App\Models\Links::destroy(Intval($id));

        //处理返回值
        if($res){
            return redirect(url('admin/links')) -> with('success','删除成功');
        } else {
            return  back() -> with('error','删除失败');
        }

    }


     /**
     * 批量删除 列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {   

       //验证id组 是否存在
       $ids = isset($_POST['ids']) ? $_POST['ids'] : '';

       //删除指定的所有id用户,永久删除
       //$res = DB::delete('delete from jc_links where id in('.$ids.')');
       //$res = App\Models\Links::destroy($ids);

       //对字符串进行拼接成数组形式
        $id = explode(',',$ids);


        //进行软删除
        $res = Links::destroy($id);

       //返回ajax 返回值
       if($res){
            echo 1;
       }else{
            echo 0;
       }

    }


         /**
     * 批量删除 回收站
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_delshow(Request $request)
    {   

       //验证id组 是否存在
       $ids = isset($_POST['ids']) ? $_POST['ids'] : '';

       //删除指定的所有id用户,永久删除
       $res = DB::delete('delete from jc_links where id in('.$ids.')');



       //返回ajax 返回值
       if($res){
            echo 1;
       }else{
            echo 0;
       }

    }


    /**
     * 回收站列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delshow(Request $request)
    {
        //回收站搜索
        $search = $request -> input('search','');

        //软删除用户列表 
        $data = Links::where('lurl','like','%'.$search.'%')->onlyTrashed() -> paginate(5)->appends($request->input());
        //dd($data);

        //返回页面
        return view('admin.links.delshow',['data'=>$data]);

    }


    /**
     * 彻底删除用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delOk($id)
    {
        
        //永久删除
        $bool = Links::where('id','=',$id)->forceDelete();
            if($bool){
                return redirect('/admin/links')-> with('error','彻底删除失败');
            }else{
                //回收站中永久删除
                $bool = Links:: onlyTrashed()->where('id','=',$id)->forceDelete();
                if($bool){
                     return redirect('/admin/links') -> with('success','彻底删除成功');
                }
            }
    }

    /**
     * 还原删除用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        //还原指定用户
        $data = Links::withTrashed()->where('id','=',$id) -> restore();
        if($data){
            return redirect( url('admin/links/delshow') ) -> with('success','还原成功');
        } else {
            return back() -> with('error/delshow','还原失败');
        }

       return redirect(url('admin/links/delshow'));

    }




    /**
     * ajax单击开启 变更state的值
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request,$id)
    {   
        //是否有state值传入
        if($request -> has('state')){
            $links = Links::find($id);
            $links -> lstate = 1;
            $res= $links -> save();
            //ajax 返回值
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return back() ->with('error','未知错误');
        };
    }


    /**
     * ajax关闭
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close(Request $request,$id)
    {
        //是否有state值传入
        if($request -> has('state')){
            $links = Links::find($id);
            $links -> lstate = 0;
            $res= $links -> save();
            //ajax 返回值
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return back() ->with('error','未知错误');
        };
    }
}
