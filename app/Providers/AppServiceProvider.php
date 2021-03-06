<?php

namespace App\Providers;


use App\Http\ViewComposers\CategorieComposer;
use App\Http\ViewComposers\TypeRessourceComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // View()->composer(['ressources.createRessource', 'accueil'], CategorieComposer::class);
        // View()->composer(['ressources.createRessource', 'accueil'], TypeRessourceComposer::class);
    }
}
