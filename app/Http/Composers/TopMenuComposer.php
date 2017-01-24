<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class TopMenuComposer {

    public function compose(View $view)
    {
        //$view->with('viewTopMenu', view('layouts.top_menu')->render());
    }

}