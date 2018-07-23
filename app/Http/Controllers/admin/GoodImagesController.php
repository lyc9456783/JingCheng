<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\GoodImages;

class GoodImagesController extends Controller
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
       //设置计算数据表中所有信息的数量
        $count = DB::table('jc_goods_images')->whereNull('deleted_at')->count();
        $id = $request->input('search');
        $goods = Goods::get();
        if($id){
            $data = GoodImages::where('gid',$id)->paginate(8)->appends($request->input());
        }else{   
            $data = GoodImages::paginate(8)->appends($request->input());
        }
        return view('admin.goodimages.index',['title'=>'商品详图','data'=>$data,'goods'=>$goods,'count'=>$count]);
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
        
        // dump();
        return view('admin.goodimages.create',['title'=>'详图添加','cates'=>self::getcates()]);
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
        $data = $request->input();

        // dump($data);
        if($request -> hasFile('images')){
            // 使用request 创建文件上传对象
            $profile = $request -> file('images');
            // dd($profile);
            foreach ($profile as $k => $v) {
                // 获取文件后缀名
                $ext = $v->getClientOriginalExtension();

                // 处理文件名称
                $temp_name = str_random(10);
                $filename =  $temp_name.'.'.$ext;
                $dirname = date('Ymd',time());

                // 保存文件
                $v -> move('./uploads/goods/gdphoto/'.$dirname,$filename); 
                $filedir = ('/uploads/goods/gdphoto/'.$dirname.'/'.$filename);
                // dd($filedir);
                $goodimages = new GoodImages;
                $goodimages-> gid = $data['gid'];
                $goodimages-> images = $filedir;
                $res = $goodimages-> save();
            } 
                if($res){
                    return redirect('/admin/goodimages')->with('success','商品详图添加完成');
                }else{
                     return back()->with('error','商品详图添加失败');
                }
            
        } else {
            return back() -> with('error','图片存储失败');
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
        $data = GoodImages::find($id);
        return view('admin.goodimages.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GoodImages::where('id',$id)->first();
        return view('admin.goodimages.edit',['title'=>'商品详图修改','data'=>$data]);
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
        if($request -> hasFile('images')){
            // 使用request 创建文件上传对象
            $profile = $request -> file('images');
            // dd($profile);
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
            $goodimages = GoodImages::find($id);
            // dd($goodimages);
            $goodimages-> images = $filedir;
            $res = $goodimages->save();
            if($res){
                return redirect('/admin/goodimages')->with('success','商品详图添加完成');
            }else{
                 return back()->with('error','商品详图添加失败');
            }
        } else {
            return back() -> with('error','图片存储失败');
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
        $res = GoodImages::destroy($id);
         if($res){
                return redirect('/admin/goodimages')->with('success','商品详图删除完成');
            }else{
                 return back()->with('error','商品详图删除失败');
            }
    }
    //设置批量删除用户方法
    public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';
        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);
        //进行删除
        $res = GoodImages::destroy($id);
         if($res){
                return redirect('/admin/goodimages')->with('success','详图批量删除完成');
            }else{
                 return back()->with('error','详图批量删除失败');
            }
    }
}
