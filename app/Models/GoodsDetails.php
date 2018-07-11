<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsDetails extends Model
{
    //对应数据表
    public $table = 'jc_goods_details';


    //对应商品表的属于关系
    public function goodsdetails()
    {
    	return $this -> belongsTo('App\Models\Goods','gid');
    }
}
