<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cates extends Model
{
	use SoftDeletes;
    public $table = 'jc_cates';
    //分类对应商品关系 一对多
    public function categoods()
    {
    	return $this -> hasMany('App\Models\Goods','gcid');
    }
}
