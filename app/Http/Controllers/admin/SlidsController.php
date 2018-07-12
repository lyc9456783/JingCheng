<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Slids;
use DB;

class SlidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取搜素条件
        $search = $request -> input('search','');

        //搜索分页
        $data = Slids::where('surl','like','%'.$search.'%')->paginate(5)->appends($request->input());

        return view('admin.slids.index',['data'=>$data]);
    }

    /**
     * 轮播图添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slids.create');
    }

    /**
     * 保存添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data = $request -> except('_token');


        //处理保存图片
        if($request -> hasFile('simg')){
            
            // 使用request 创建文件上传对象
            $profile = $request -> file('simg');
            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $filename =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            // 保存文件
            $profile -> move('./uploads/slideshow/'.$dirname,$filename);
            $fileadd = ('/uploads/slideshow/'.$dirname.'/'.$filename);
        } else {
            return back() -> with('error','没有上传图片!');
        }      

        //存储信息
        $slids = new Slids;
        $slids -> surl = $data['surl'];
        $slids -> state = $data['state'];
        $slids -> simg = $fileadd;
        $res = $slids -> save();

        //处理返回值
        if($res){
            return redirect(url('admin/slids')) -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
    }

    /**
     * 轮播图信息修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Slids::where('state','=','1')->paginate();
        //dump($data);
        return view('admin.slids.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改信息
       $data = Slids::find($id);
      //dump($data);

       return view('admin.slids.edit',['data'=>$data]);
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
        $data = $request -> except(['_token']);
        //dump($request -> except(['_token']));

         //存储信息
        $slids = Slids::find($id);
        $slids -> surl = $data['surl'];
        $slids -> state = $data['state'];
        $res = $slids -> save();

        //处理返回值
        if($res){
            return redirect(url('admin/slids')) -> with('success','添加成功');
        }else{
            return redirect() -> back() -> with('error','添加失败');
        }
    }

    /**
     * 用户删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
        //删除指定用户
        $res = \App\Models\Slids::destroy(Intval($id));

        //返回值处理
        if($res)
        {
            return redirect( url('admin/slids') ) -> with('success','删除成功');
        } else {
            return back() -> with('error','删除失败');
        }

    }


    /**
     * 已删除用户列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delshow(Request $request)
    {
        //获取搜素条件
        $search = $request -> input('search','');

        //以删除的用户 
        $data = Slids::where('surl','like','%'.$search.'%')->onlyTrashed() -> paginate(5)->appends($request->input());
        //dd($data);

        return view('admin.slids.delshow',['data'=>$data]);

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
        $data = Slids::withTrashed()->where('id','=',$id) -> restore();
        if($data){
            return redirect( url('admin/slids/delshow') ) -> with('success','还原成功');
        } else {
            return back() -> with('error','还原失败');
        }

       return redirect(url('admin/slids/delshow'));

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
         $bool = Slids::where('id','=',$id)->forceDelete();
          if($bool){
            return redirect('/admin/slids/delshow') -> with('success','删除成功');
           }else{
              //回收站中永久删除
              $bool = Slids:: onlyTrashed()->where('id','=',$id)->forceDelete();
              if($bool);
              return redirect('/admin/slids/delshow') -> with('success','删除成功');
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
        $res = Slids::destroy($id);

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
    public function deldelshow(Request $request)
    {   

       //验证id组 是否存在
       $ids = isset($_POST['ids']) ? $_POST['ids'] : '';

       //删除指定的所有id用户,永久删除
       $res = DB::delete('delete from jc_slids where id in('.$ids.')');

       //返回ajax 返回值
       if($res){
            echo 1;
       }else{
            echo 0;
       }

    }





    /**
     * ajax开启
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request,$id)
    {
        if($request -> has('state')){
            $slids = Slids::find($id);
            $slids -> state = 1;
            $res= $slids -> save();

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

        if($request -> has('state')){
            $slids = Slids::find($id);
            $slids -> state = 0;
            $res= $slids -> save();

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
