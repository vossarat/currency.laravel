<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Office extends Model
{
    protected $fillable = [
		'fullname',
		'user_id',
		'city_id' ,
		'phone',
		'geolocation',
		'image'
	];
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
