<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $table = 'jc_goods';
    //软删除
    use SoftDeletes;
    //与评论之间的一对多关系
    public function discussgoods()
    {
    	return $this -> hasMany('App\Models\Discuss','gid');
    }
    //与商品分类的属于关系
    public function catesgoods()
    {
    	return $this -> belongsTo('App\Models\Cates','gcid');
    }
    //与商品详情的一对一关系
    public  function detailsgoods()
    {
    	return $this -> hasOne('App\Models\GoodsDetails','gid');
    }

    //商品对应商品图片管理一对多
    public function goodimages()
    {
    	return $this -> hasMany('App\Models\GoodImages','gid');
    }

    //商品对应库存的关系一对一
    public function entrepotsgoods()
    {
    	return $this -> hasOne('App\Models\Entrepots','gid');
    }

}
