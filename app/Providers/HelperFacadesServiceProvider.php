<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperFacadesServiceProvider extends ServiceProvider
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
        $this->app->bind('helperclass',function(){
            return new HelperClass();
        });
    }
}
