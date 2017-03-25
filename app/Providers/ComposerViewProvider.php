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
        View::composer('default.layouts.navbar', 'App\Http\Composers\NavbarComposer');
        View::composer('default.layouts.footer', 'App\Http\Composers\FooterComposer');
        View::composer('admin.layouts.sidebar', 'App\Http\Composers\AdminSidebarComposer');
        View::composer('default.layouts.sidebar', 'App\Http\Composers\DefaultSidebarComposer');
        View::composer('admin.user.logoselect', 'App\Http\Composers\AdminLogoSelectComposer');
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
