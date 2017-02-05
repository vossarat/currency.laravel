<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['title','url'];
		
    public function getMenu(){
		return Menu::all();
	}
}
