<?php

namespace App\Providers;

use App\View\Components\AttractionsComposer;
use App\View\Components\BazaarsComposer;
use App\View\Components\HotelsCompsoer;
use App\View\Components\LocaleComposer;
use App\View\Components\RestaurantsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class  ViewServiceProvider extends ServiceProvider
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
        View::composer('*', LocaleComposer::class);
        View::composer('*', HotelsCompsoer::class);
        View::composer('*', AttractionsComposer::class);
        View::composer('*', RestaurantsComposer::class);
        View::composer('*', BazaarsComposer::class);
    }
}
