<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Recommends;
use App\Models\Cates;
use App\Models\Goods; 
use DB;
class Recommendcontroller extends Controller
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
        // 获取搜索内容
        $req = $request -> input('search');
        $data = DB::table('jc_recommends as r')
            ->join('jc_goods as g','g.id','=','r.gid')
            ->where('g.name','like','%'.$req.'%')
            ->select('r.id','r.rimg','r.rstate','g.name')
            ->paginate(2)->appends($request->input());
        // dump($req);
            // dump($data);
        return view('admin.recommend.index',['title'=>'商品推荐列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if($request ->ajax()){
            $gcid = $request->input('gcid','');
            // dump($gcid);
            $goods = Goods::where('gcid',$gcid)->get();
            echo  json_encode($goods);
            return;
        }
        
        // dump();
        // return view('admin.goodimages.create',['title'=>'详图添加','cates'=>self::getcates()]);
        return view('admin.recommend.create',['title'=>'添加商品推荐','cates'=>self::getcates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $req = $request -> all();
        // dump($req);
        //处理保存图片
        if($request -> hasFile('rimg')){
            
            // 使用request 创建文件上传对象
            $profile = $request -> file('rimg');
            foreach($profile as $k=>$v){
            // 获取文件后缀名
                $ext = $v->getClientOriginalExtension();
                // 处理文件名称
                $temp_name = str_random(10);
                $filename =  $temp_name.'.'.$ext;
                $dirname = date('Ymd',time());
                // 保存文件
                $v -> move('./uploads/'.$dirname,$filename);
                $fileadd = ('/uploads/'.$dirname.'/'.$filename);
                $recommend = new Recommends;
                $recommend -> gid = $req['gid'];
                $recommend -> rimg = $fileadd;
                $recommend -> rstate = $req['rstate'];
                $res = $recommend -> save();
            }
        } else {
            return back() -> with('error','未上传推荐图片');
        }

        
        if($res){
            return redirect('/admin/recommend')->with('success','添加成功');
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
        $recommend = Recommends::find($id);
        if($recommend->rstate == '1'){
            $recommend -> rstate = '0';
            $recommend -> save();
            return redirect('/admin/recommend')->with('success','关闭成功');
        }else{
            $recommend -> rstate = '1';
            $recommend -> save();
            return redirect('/admin/recommend')->with('error','启用成功');
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

        $data = Recommends::find($id);
        $cates = Cates::all();
        $goods = Goods::all();
        
        // dump($cates);

        return view('admin.recommend.edit',['title'=>'修改推荐商品','cates'=>$cates,'goods'=>$goods,'data'=>$data]);
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
        $req = $request -> except(['_token']);
        $recommend = Recommends::find($id);
        if($request -> hasFile('rimg')){
             // 使用request 创建文件上传对象
            $profile = $request -> file('rimg');
            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(10);
            $filename =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            // 保存文件
            $profile -> move('./uploads/'.$dirname,$filename);
            $fileadd = ('/uploads/'.$dirname.'/'.$filename);

            $recommend -> rimg = $fileadd;
        }
        
        $recommend -> gid = $req['gid'];
        $recommend -> rstate = $req['rstate'];
        $res = $recommend -> save();
        if($res){
            return redirect('admin/recommend')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    public function destroy($id)
    {
        $data = Recommends::find($id);
        
        $res = $data->delete();
        if($res){
            return redirect('/admin/recommend')->with('success','删除成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //查看图片
    public function img($id)
    {
        $recommend = Recommends::find($id);
        return view('admin.recommend.show',['data'=>$recommend]);
    }

    //批量删除
    public function delall()
    {   
        //接受用户传过来的数值组
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';


        //对字符串进行拼接成数组形式
        $id = explode(',',$ids);


        //进行软删除
        $res = Recommends::destroy($id);
        if($res){
            return redirect('admin/recommend')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }


    }

}
