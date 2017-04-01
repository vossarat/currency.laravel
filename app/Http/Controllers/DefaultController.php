<?php

namespace App\Http\Controllers;

use App\MainPage;
use Request;
use App\OfficePage;
use App\Currency;
use Storage;


class DefaultController extends Controller
{

	public function __construct(MainPage $mainPage, OfficePage $officePage){
		$this->mainPage = $mainPage;
		$this->officePage = $officePage;
	}

	public function index(Currency $currencyData) //IndexPage + данные о валюте из Eloquiment Currency
	{
		
		//dd(Storage::disk('logotips')->url('Altyn Bank.png'));
		return view('default.index')->with([
				'viewdata' => $this->mainPage->getCurrencyNationalBankData(),
				'currencyData' => $currencyData->all(),
			]);
	}
	
	public function OfficePage() // OfficePage
	{
		
		$currencyJsonData = $this->officePage->getCurrencyJsonData();
		
		$currencyUniqueName = $this->officePage->getCurrencyUniqueName($currencyJsonData);
		$currencyAll = $this->officePage->getCurrencyAll($currencyJsonData, $currencyUniqueName);

		return view('default.office')->with([
				'viewdata' => (object)$currencyAll,
				'viewUniqueCurrency' => $currencyUniqueName,
			]);
	}
	
}
