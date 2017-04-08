<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
	private $jsonUrl = "http://akmzdrav.kz/kase/qwerty/finjson1.json";

	public function getResourceJsonData()
	{
		$jsonData = file_get_contents($this->jsonUrl);
		$resourceJsonData = json_decode($jsonData,TRUE);
		return $resourceJsonData['resources'];
	}

	public function getResourcesAddData()
	{
		return array(
			array('fields'=> [
					'name' => 'GOLD 1 OZ',
					'rusname' => 'Золото',
					'description' => 'Цена за тройскую унцию',
				]),
			array('fields'=> [
					'name' => 'PLATINUM 1 UZ 999',
					'rusname' => 'Платина',
					'description' => 'Цена за унцию',
				]),
			array('fields'=> [
					'name' => 'PALLADIUM 1 OZ',
					'rusname' => 'Палладий',
					'description' => 'Цена за унцию',
				]),
			array('fields'=> [
					'name' => 'SILVER 1 OZ 999 NY',
					'rusname' => 'Серебро',
					'description' => 'Цена за тройскую унцию',
				]),
			array('fields'=> [
					'name' => 'Brent Crude Oil',
					'rusname' => 'Нефть Brent',
					'description' => 'Цена за баррель',
				]),
			array('fields'=> [
					'name' => 'Crude Oil',
					'rusname' => 'Нефть WTI',
					'description' => 'Цена за баррель',
				]));

	}
	
}
