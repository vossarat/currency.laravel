<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;

class City extends Model
{

    public function offices()
	{
		return $this->hasMany('App\Office');
	}
	
}
