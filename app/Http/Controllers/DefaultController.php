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
		$viewUniqueCurrency = $this->contentPage->getUniqueCurrency($viewdata);
		return view('default.index')->with([
				'viewdata' => $viewdata,
				'viewUniqueCurrency' => $viewUniqueCurrency,
			]);

	}

	/*public function testjson()
	{
	return Response::json(
	["data" => [
	[
	"USD",
	"307",
	"310",
	],
	[
	"EUR",
	"327",
	"330",
	],
	]]
	);

	}*/

}
