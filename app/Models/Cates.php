<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cates extends Model
{
	use SoftDeletes;
    public $table = 'jc_cates';
}
