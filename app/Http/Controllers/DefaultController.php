<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainPage;

class DefaultController extends Controller
{
    public function index() {
    	
    	$contentMainPage = MainPage::content();
		return view('main')->with(['content' => $contentMainPage]);		
	}
}
