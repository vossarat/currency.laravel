<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
	private $jsonUrl = "http://37.150.124.26:3012";

	public function getJsonData(){
		$json = file_get_contents($this->jsonUrl);
		$jsonData = json_decode($json);
		dd($jsonData);
		return $jsonData;		
	}
	
	public function getUniqueCurrency($jsonData){
		foreach($jsonData as $item){
			foreach($item->currency as $currency){
				$nameCurrency[] = $currency->code;
			}
		}

		$uniqueCurrency = collect($nameCurrency)->unique()->all();
		return $uniqueCurrency;
	}
}
