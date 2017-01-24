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
        View::composer('main', 'App\Http\Composers\TopMenuComposer');
        View::composer('main', 'App\Http\Composers\FooterComposer');
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
