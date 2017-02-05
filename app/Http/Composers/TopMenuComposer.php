<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use App\Menu;

class TopMenuComposer {	
	

    public function compose(View $view)
    {        
    	$viewdata = Menu::all(); 	
        $view->with('viewdata', $viewdata);
    }

}