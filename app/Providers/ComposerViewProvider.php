<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Composers\TopMenuComposer;
use App\Http\Composers\FooterComposer;


class ComposerViewProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        View::composer('default.layouts.top_menu', 'App\Http\Composers\TopMenuComposer');
        View::composer('default.layouts.footer', 'App\Http\Composers\FooterComposer');
        View::composer('admin.layouts.sidebar', 'App\Http\Composers\SidebarComposer');
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
