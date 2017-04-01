<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Currency;

class MainPage extends Model
{
	private $xml = "http://www.nationalbank.kz/rss/rates_all.xml";
	
	public function getCurrencyNationalBankData()
	{		
		$xmlData = file_get_contents($this->xml);		
		$currencyNationalBankData = json_decode(json_encode(simplexml_load_string($xmlData)));
		return $currencyNationalBankData->channel->item;
	}	
	
}
