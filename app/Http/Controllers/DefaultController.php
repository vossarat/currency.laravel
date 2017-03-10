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
		$jsonData = $this->contentPage->getJsonData();
		$uniqueCurrency = $this->contentPage->getUniqueCurrency($jsonData);		
		
		$allCurrency = $this->contentPage->allCurrency($jsonData, $uniqueCurrency);		
		
		return view('default.index')->with([
				'viewdata' => (object)$allCurrency,
				'viewUniqueCurrency' => $uniqueCurrency,
			]);

	}

}
