<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Menu extends Model
{
	protected $fillable = [
		'title',
		'url',
		'icon',
		'published',
		'weight',
		'position',
		'category',
		'is_category',
	];

	/*Создание рекурсивной связи для категории*/
	public function parentMenu()
	{
		return $this->hasOne('App\Menu', 'id', 'category');
	}


	public static function getMenuIdByTitle($title)
	{
		return self::where('title','=',$title)->first()->id;
	}


	public function getDataMenuEditForm($id)
	{
		$dataMenuEditForm = $this->find($id);
		$dataMenuEditForm['category'] = $this->find($id)->parentMenu->title;
		$dataMenuEditForm['categories'] = $this->categories()->get();
		$dataMenuEditForm['positions'] = $this->getPosition();
		return $dataMenuEditForm ;

	}
	
	public function ScopePublished($query){
		return $query->where('published', 1);
	}
	
	public function ScopePosition($query, $position){
		return $query->where('position', '=', $position);
	}
	
	public function ScopeCategories($query){
		return $query->where('is_category', '=', 1);
	}

	public function getPosition()
	{
		return [
			'topmenu',
			'sidebar',
			'adminmenu',
		];
	}

}
