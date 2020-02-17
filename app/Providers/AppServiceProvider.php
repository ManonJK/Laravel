<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

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
        // Pour éviter le probleme de longueur de clé sur les versions < 8 de Mysql
        Schema::defaultStringLength(250);

        //Directives blade personnalisées pour l'affichage des boutons d'ajout, modification, suppression en fonction des roles
        Blade::if('admin', function(){
            return Auth::check() && Auth::user()->isAdministrator();
        });
        Blade::if('selforadmin', function($id){
            return Auth::check() && (Auth::user()->isAdministrator() || Auth::user()->id ==$id);
        });
    }


}
