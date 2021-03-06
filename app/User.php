<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;
use App\Office;

class User extends Authenticatable
{
	use Notifiable;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'login', 'email', 'password',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token',
	];


	public function office()
	{
		return $this->hasOne('App\Office');
	}
	
	public function getFilesForBrowse()
	{
		$disk = Storage::disk('logotips');
		$allFiles = $disk->allFiles();
		return $allFiles;
	}

}
