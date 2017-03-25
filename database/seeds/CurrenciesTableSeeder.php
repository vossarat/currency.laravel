<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arr = ["AUD"=>"Австралийский доллар","GBP"=>"Фунт стерлингов","DKK"=>"Датская крона","AED"=>"Дирхам (ОАЭ)","USD"=>"Доллар США","EUR"=>"Евро","CAD"=>"Канадский доллар","CNY"=>"Китайский юань","KWD"=>"Кувейтский динар","KGS"=>"Киргизский сом","LVL"=>"Латвийский лат","MDL"=>"Молдавский лей","NOK"=>"Норвежская крона","SAR"=>"Саудовский риял","RUB"=>"Российский рубль","XDR"=>"Специальные права заимствования","SGD"=>"Сингапурский доллар","TRL"=>"Турецкая лира","UZS"=>"Узбекский сум","UAH"=>"Украиская гривна","SEK"=>"Шведская крона","CHF"=>"Швейцарский франк","EEK"=>"Эстонская крона","KRW"=>"Вона Республики Корея","JPY"=>"Японская иена","BYR"=>"Белорусский рубль","PLN"=>"Польский злотый","ZAR"=>"Южноафриканский рэнд","TRY"=>"Турецкая лира","HUF"=>"Венгерский форинт","CZK"=>"Чешская крона","TJS"=>"Таджикский сомони","HKD"=>"Гонконгский доллар","BRL"=>"Бразильский реал","MYR"=>"Малайзийский ринггит","AZN"=>"Азербайджанский манат","INR"=>"Индийская рупия","THB"=>"Таиландский бат","AMD"=>"Армянский драм","GEL"=>"Грузинский лари","IRR"=>"Иранский риал","MXN"=>"Мексиканское песо","BYN"=>"Белорусский рубль"];
		
		$i=0;
		foreach($arr as $key => $item){
			$newarr[$i]['title'] = $key;
			$newarr[$i]['rusname'] = $item;
			$i++;
			}
			
		$arr2 = ["AUD"=>"$","GBP"=>"£","DKK"=>"kr","AED"=>"Dh","USD"=>"$","EUR"=>"€","CAD"=>"$","CNY"=>"¥","KWD"=>"KD","KGS"=>"с","LVL"=>"Ls","MDL"=>"L","NOK"=>"kr","SAR"=>"SR","RUB"=>"₽","XDR"=>"XDR","SGD"=>"$","TRL"=>"TL","UZS"=>"so’m","UAH"=>"₴","SEK"=>"kr","CHF"=>"₣","EEK"=>"kr","KRW"=>"₩","JPY"=>"¥","BYR"=>"Br","PLN"=>"zł","ZAR"=>"R","TRY"=>"₺","HUF"=>"Ft","CZK"=>"Kč","TJS"=>"с.","HKD"=>"$","BRL"=>"$","MYR"=>"RM","AZN"=>"man","INR"=>"₹","THB"=>"฿","AMD"=>"դր.","GEL"=>"ლ.","IRR"=>"IR","MXN"=>"$","BYN"=>"Br"];
		
		foreach($newarr as $key => $item){
			foreach($arr2 as $name => $symbol){
				if($item['title'] == $name){
					$newarr[$key]['symbol'] = $symbol;
				}
			}
		}
    	
         foreach($newarr as $item){
		 	Currency::create([
                'title'=>$item['title'],
                'symbol'=>$item['symbol'],
                'rusname'=>$item['rusname'],
            ]);
		 }
         
    }
}
