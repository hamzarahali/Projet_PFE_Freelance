<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\NullStore;
use Cache;
class AppServiceProvider extends ServiceProvider
{ 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /* if ($this->app->isLocal()) {
              //if local register your services you require for development
              $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            }else{
                  //else register your services you require for production
                $this->app['request']->server->set('HTTPS', true);
            }*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Cache::extend('none', function ($app) {
            return Cache::repository(new NullStore);
        });
    }
}
