<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
	private $xml = "http://www.nationalbank.kz/rss/rates_all.xml";

	public function getCurrencyNationalBankData()
	{		
		$xmlData = file_get_contents($this->xml);		
		$currencyNationalBankData = json_decode(json_encode(simplexml_load_string($xmlData)));
		return $currencyNationalBankData;
	}
	
	
	public function getCurrencyInfo($arrayCurrencyInfo, $currencyTitle)
	{
		$collectionCurrencyInfo = collect($arrayCurrencyInfo);
		$currencyInfo =  $collectionCurrencyInfo->where('title', $currencyTitle);		
		return $currencyInfo->first();
	} 
	
}
