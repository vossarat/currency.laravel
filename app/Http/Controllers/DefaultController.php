<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\MainPage;
use App\Menu;

class DefaultController extends Controller
{

    public function index() {
    	
    	$contentMainPage = MainPage::content();
		return view('default.index')->with(['content' => $contentMainPage]);		
	}
	
}
