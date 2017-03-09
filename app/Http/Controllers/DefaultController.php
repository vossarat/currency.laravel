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
		$viewdata = $this->contentPage->getJsonData();
		
		foreach($viewdata as $key => $item){
			
			$viewdata[$key]['currency'][] = $this->contentPage->getArray();	
					
		}
		
	
		$viewUniqueCurrency = $this->contentPage->getUniqueCurrency($viewdata);
		return view('default.index')->with([
				'viewdata' => json_decode(json_encode($viewdata)),
				'viewUniqueCurrency' => $viewUniqueCurrency,
			]);

	}

}
