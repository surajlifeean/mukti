<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class identitydetail extends Model
{
    public function addressdetail(){
    	return $this->hasOne('App\addressdetail','customer_id', 'id');
    }
}
