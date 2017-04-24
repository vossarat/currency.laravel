<?php

namespace App\Http\Controllers;

use App\MainPage;
use Request;
use Storage;
use App\OfficePage;
use App\Currency;
use App\Resource;

/**
* Временный проба парсера
*/
use Symfony\Component\DomCrawler\Crawler;


class DefaultController extends Controller
{

    public function __construct(MainPage $mainPage, OfficePage $officePage)
    {
        $this->mainPage = $mainPage;
        $this->officePage = $officePage;
    }

    /**
    *
    * @param IndexPage + данные о валюте из Eloquiment Currency
    *
    * @return
    */
    public function index(Currency $currencyData)
    {

        return view('default.index')->with([
                'viewdata' => $this->mainPage->getCurrencyNationalBankData(),
                'currencyData' => $currencyData->all(),
                //'newsKase' => $this->news(), disable news KASE
            ]);
    }

    /**
    *
    * @param IndexPage + данные о валюте из Eloquiment Currency
    *
    * @return
    */
    public function currencyAll(Currency $currencyData)
    {

        return view('default.currency_all')->with([
                'viewdata' => $this->mainPage->getCurrencyNationalBankData(),
                'currencyData' => $currencyData->all(),
            ]);
    }

    /**
    * OfficePage
    *
    * @return
    */
    public function OfficePage()
    {

        $currencyJsonData = $this->officePage->getCurrencyJsonData();

        $currencyUniqueName = $this->officePage->getCurrencyUniqueName($currencyJsonData);
        $currencyAll = $this->officePage->getCurrencyAll($currencyJsonData, $currencyUniqueName);

        return view('default.office')->with([
                'viewdata' => (object)$currencyAll,
                'viewUniqueCurrency' => $currencyUniqueName,
            ]);
    }


    public function ResourcePage(Resource $resource)
    {
        $collectionResourcesJSON = collect($resource->getResourceJsonData()); //коллекция данных о ресурсах с внешнего JSON
        $collectionResourcesAdd = collect($resource->getResourcesAddData()) ; // дополнительная информация о ресурсах

        //dd($collectionResourcesJSON);

        return view('default.resource')->with([
                'jsonData' => $collectionResourcesJSON,
                'addData' => $collectionResourcesAdd,
            ]);

    }

    /**
    *
    */
    public function news()
    {

        $html = file_get_contents('http://www.kase.kz');
        $crawler = new Crawler();
        $crawler->addContent($html);
       
        $attributes = $crawler
		    ->filter('#kasenewstext')->filter('a')
		    ->extract(array('_text', 'href'));		
		
		
		foreach($attributes as $key => $attribute) {
			
			if($key > 9) {
				break;
			}
			
			$htmlOneNew = file_get_contents( 'http://www.kase.kz'.$attribute[1] );
			$crawlerNew = new Crawler();
			$crawlerNew->addContent($htmlOneNew);
			
			$attributes[$key][3] = $crawlerNew->filter('pre')->html();
			
		}
		return $attributes;
    }
    
    public function newsProdengi()
    {
    	//https://prodengi.kz/lenta/

        $html = file_get_contents('https://prodengi.kz/lenta/');
        $crawler = new Crawler();
        $crawler->addContent($html);
       
        $attributes = $crawler
		    ->filter('#kasenewstext')->filter('a')
		    ->extract(array('_text', 'href'));		
		
		
		foreach($attributes as $key => $attribute) {
			
			if($key > 9) {
				break;
			}
			
			$htmlOneNew = file_get_contents( 'http://www.kase.kz'.$attribute[1] );
			$crawlerNew = new Crawler();
			$crawlerNew->addContent($htmlOneNew);
			
			$attributes[$key][3] = $crawlerNew->filter('pre')->html();
			
		}
		return $attributes;
    }

}
