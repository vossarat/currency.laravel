<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Response;
use App\MainPage;
use App\Menu;

class DefaultController extends Controller
{

	public function __construct(MainPage $contentPage){
		$this->contentPage = $contentPage;
	}

	public function index(){

		$currencyJsonData = $this->contentPage->getCurrencyJsonData();
		
		$currencyUniqueName = $this->contentPage->getCurrencyUniqueName($currencyJsonData);		
		
		$currencyAll = $this->contentPage->getCurrencyAll($currencyJsonData, $currencyUniqueName);		
		
		return view('default.index')->with([
				'viewdata' => (object)$currencyAll,
				'viewUniqueCurrency' => $currencyUniqueName,
			]);

	}

}
