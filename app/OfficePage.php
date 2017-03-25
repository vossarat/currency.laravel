<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficePage extends Model
{
    private $jsonUrl = "http://37.150.124.26:3012";

	public function getCurrencyJsonData()
	{
		$jsonData = file_get_contents($this->jsonUrl);
		$currencyJsonData = json_decode($jsonData);
		return $currencyJsonData;
	}


	public function getCurrencyUniqueName($currencyJsonData)
	{

		foreach ($currencyJsonData as $item)
		{
			foreach ($item->currency as $currency)
			{
				$currencyName[] = $currency->code;
			}
		}

		$currencyUniqueName = collect($currencyName)->unique()->sort()->all();
		return $currencyUniqueName;
	}

	//function добавляем пустые курсы, чтоб получить все возможные валюты
	public function getCurrencyAll($currencyJsonData, $currencyUniqueName) 
	{
		//поиск разницы между текущими данными и всеми возможными видами валютам 
		foreach ($currencyJsonData as $key => $item)
		{
			$currencyCollections = collect($item->currency);
			$implodeCurrencyCollections = $currencyCollections->implode('code','-');
			$implodeCurrencyCollections = explode('-', $implodeCurrencyCollections);
			$diff = collect($currencyUniqueName)->diff($implodeCurrencyCollections);

			foreach ($diff as $currencyName)
			{
				$currencyJsonData[$key]->currency[] = (object)['code'=>$currencyName, 'buy'=> '-', 'sell'=> '-'];
			}

		}

		foreach ($currencyJsonData as $key => $item)
		{
			usort($currencyJsonData[$key]->currency, function($a, $b)
				{
					return $a->code <=> $b->code;
				});
		}

		return $currencyJsonData;

	}
}
