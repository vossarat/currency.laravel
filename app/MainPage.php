<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
	private $jsonUrl = "http://37.150.124.26:3012";

	public function getJsonData(){
		$json = file_get_contents($this->jsonUrl);
		$jsonData = json_decode($json, true);
		return $jsonData;
	}

	public function getUniqueCurrency($jsonData){
		foreach(json_decode(json_encode($jsonData)) as $item)
		{
			foreach($item->currency as $currency)
			{
				$nameCurrency[] = $currency->code;
			}
		}

		$uniqueCurrency = collect($nameCurrency)->unique()->all();
		return $uniqueCurrency;
	}

	public function getArray(){
		
		return ['code'=>'XXX', 'buy'=>'0', 'sell'=>'0'];

	}
}
