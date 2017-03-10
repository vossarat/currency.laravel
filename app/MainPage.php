<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    private $jsonUrl = "http://37.150.124.26:3012";

    public function getJsonData()
    {
        $json     = file_get_contents($this->jsonUrl);
        $jsonData = collect(json_decode($json, true));
        return $jsonData;
    }


    public function getUniqueCurrency($jsonData)
    {

        foreach ($jsonData as $item)
        {
            foreach ($item->currency as $currency)
            {
                $nameCurrency[] = $currency->code;
            }
        }

        $uniqueCurrency = collect($nameCurrency)->unique()->all();
        return $uniqueCurrency;
    }

    //добавляем пустые курсы, чтоб получить все возможные валюты
    public function allCurrency($jsonData, $currencyUnique)
    {
        foreach ($jsonData as $key => $item) {
            $currencyCollections        = collect($item->currency);
            $implodeCurrencyCollections = $currencyCollections->implode('code','-');
            $implodeCurrencyCollections = explode('-', $implodeCurrencyCollections);
            $diff                       = collect($currencyUnique)->diff($implodeCurrencyCollections);

            foreach ($diff as $currencyName)
            {
                $jsonData[$key]->currency[] = (object)['code'=>$currencyName, 'buy'=>0, 'sell'=>0];
            }

        }
        
        return $jsonData;

    }
}
