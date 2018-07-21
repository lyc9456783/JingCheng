<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'jc_user_address';

    public function addressusers()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }
}
