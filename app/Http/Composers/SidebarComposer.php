<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class SidebarComposer {

    public function compose(View $view)
    {
    	//$contentFooter = Footer::content();
        $view;//->with('contentFooter', $contentFooter);
	}
}