<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserFacadesServiceProvider extends ServiceProvider
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
        $this->app->bind('userclass',function(){
            return new UserClass();
        });
    }
}
