<?php

namespace App\Http\Controllers;

use App\MainPage;
use Request;
use App\OfficePage;
use App\Currency;


class DefaultController extends Controller
{

	public function __construct(MainPage $mainPage, OfficePage $officePage){
		$this->mainPage = $mainPage;
		$this->officePage = $officePage;
	}

	public function index(Currency $currencyData) //+ данные о валюте из Eloquiment Currency
	{ 

		$currencyNationalBankData = $this->mainPage->getCurrencyNationalBankData()->channel->item;
		
		return view('default.index')->with([
				'viewdata' => $currencyNationalBankData,
				'currencyData' => $currencyData->all(),
				'USD' => $this->mainPage->getCurrencyInfo($currencyNationalBankData, 'USD'),
				'EUR' => $this->mainPage->getCurrencyInfo($currencyNationalBankData, 'EUR'),
				'RUB' => $this->mainPage->getCurrencyInfo($currencyNationalBankData, 'RUB'),
			]);

	}
	
	public function OfficePage(){
		
		$currencyJsonData = $this->officePage->getCurrencyJsonData();		
		
		$currencyUniqueName = $this->officePage->getCurrencyUniqueName($currencyJsonData);		
		
		$currencyAll = $this->officePage->getCurrencyAll($currencyJsonData, $currencyUniqueName);
		

		return view('default.office')->with([
				'viewdata' => (object)$currencyAll,
				'viewUniqueCurrency' => $currencyUniqueName,
			]);
	}
	
	public function sendFile(Request $request)
	{
		return $request;
		//$request->image->move(storage_path('app/public/logotips'), $request->image->getClientOriginalName());
		//return 'ok';
		//return back();		
	}

}
