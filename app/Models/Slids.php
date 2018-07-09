<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Slids extends Model
{
    //设置表名
    public $table = 'jc_slids';
    //设置主键
    public $primaryKey = 'id';
    //软删除
    use SoftDeletes;




}
