<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Recommends extends Model
{
	//设置表名
    public $table = 'jc_recommends';
    //属于商品表
    public function goodrecommend()
    {
    	return $this -> belongsTo('App\Models\Goods','gid');
    }
}
