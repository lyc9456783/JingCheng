<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  //引入软删除

    class Users extends Model
    {
        //设置查找的表名
        public $table = 'jc_users';

        //引入软删除
        use SoftDeletes;

        //设置一对一关系
        public function Userdetails()
        {
        	return $this->hasOne('App\Models\Userdetails','uid');

        }

        //用户和商品收藏多对多
        public function shoucang()
        {
            return $this -> belongsToMany('App\Models\Goods','jc_users_goods','uid','gid');
        }
        //用户与收藏商品的一对多关系
        public function usercollect()
        {
            return $this -> hasMany('App\Models\Collect','uid');
        }
        //用户与购物车商品多对多
        public function usershopcar()
        {
            return $this -> belongsToMany('App\Models\Goods','jc_shop_cars','uid','gid');
        }
    }
