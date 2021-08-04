<?php

namespace App\Providers;

use App\Catalogue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // You can use a class for composer
        // you will need NavComposer@compose method
        // which will be called everythime partials.nav is requested
        // View::composer(
        //     'front.partials._nav',
        //     'App\Http\ViewComposers\NavComposer'
        // );

        // You can use Closure based composers
        // which will be used to resolve any data
        // in this case we will pass menu items from database
        View::composer(['front.partials._nav', 'front.auth.partials._nav'], function ($view) {
            $prices = get_curl("https://blockchain.info/ticker");
            $catalogue = Catalogue::all();

            $view->with('menu', $prices["USD"]["sell"])->with('catalogue', $catalogue);
        });
    }
}
