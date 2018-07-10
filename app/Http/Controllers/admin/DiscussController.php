<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Discuss;
use DB;
use App\Models\Goods;
class DiscussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $req = $request -> has('search');
            $req = $request -> input('search','');
            $data = DB::table('jc_discuss as d')
                ->join('jc_goods as g','d.gid','=','g.id')
                ->join('jc_users as u','d.uid','=','u.id')
                ->join('jc_user_details as user','user.uid','=','u.id')
                ->where('g.name','like','%'.$req.'%')
                ->select('d.id','g.name','user.nickname','d.content')
                ->paginate(2)->appends($request->input());
            // dump($data);
            // $data1 = Goods::where('name','like','%'.$req.'%')->get();
            // foreach ($data1 as $k => $v)
            // {
            //     $data = Discuss::where('gid','=',$v->id)->paginate(10);
            // }

             // return view('admin.discuss.index',['title'=>'评论列表','data'=>$data,'req'=>$req]);
        
            // dump($req);
            
            // dump($data);
            return view('admin.discuss.index',['title'=>'评论列表','data'=>$data,'req'=>$req]);
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discuss.create',['title'=>'添加评论']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> except(['_token']);
        // dump($data);
        $discuss = new Discuss;
        $discuss->content=$data['content'];
        $res = $discuss->save();

        if($res){
            return redirect('/admin/discuss')->with('success','添加成功');
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
        $data = Discuss::find($id);

        return view('/admin/discuss/edit',['data'=>$data,'title'=>'修改评论']);
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
        $data = $request -> except(['_token']);
        // dump($req);
        $discuss = Discuss::find($id);
        // dump($data);
        $discuss->content=$data['content'];
        $res = $discuss->save();
        // $res = DB::table('jc_discuss')->where('id',$id)->update(['uid'=>$req['uid'],'gid'=>$req['gid'],'content'=>$req['content']]);
        // dump($res);
        if($res){
            return redirect('/admin/discuss')->with('success','修改成功');
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
    public function destroy($id)
    {
        $data = Discuss::find($id);
        
        $res = $data->delete();
        if($res){
            return redirect('/admin/discuss')->with('success','删除成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    public function delete(Request $request)
    {
        $data[] = $request -> input('')->with('success','删除成功');
        dump($data);
    }

}
