<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class FooterComposer {

    public function compose(View $view)
    {
        $view->with('viewFooter', view('layouts.footer'));
    }

}