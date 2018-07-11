<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodImages extends Model
{
    public $table = 'jc_goods_images';

    //配置与商品表的属于关系
     public function imagegoods()
    {
    	return $this -> belongsTo('App\Models\Goods','gid');
    }
}
