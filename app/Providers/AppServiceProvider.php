<?php

namespace App\Providers;


use App\Http\ViewComposers\CategorieComposer;
use App\Http\ViewComposers\TypeRessourceComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {       
            URL::forceScheme('https');
    }
}