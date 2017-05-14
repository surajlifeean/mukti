<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addressdetail extends Model
{
		    public function identitydetail()
		{
		    return $this->belongsTo('App\identitydetail');
		}
}
