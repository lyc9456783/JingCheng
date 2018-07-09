<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $table = 'jc_goods';

    public function discussgoods()
    {
    	return $this -> hasMany('App\Models\Discuss','gid');
    }
}
