<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use App\Footer;

class FooterComposer {

    public function compose(View $view)
    {
    	$contentFooter = Footer::content();
        $view->with('contentFooter', $contentFooter);
	}
}