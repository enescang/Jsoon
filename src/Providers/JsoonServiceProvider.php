<?php
namespace Kodcanlisi\Jsoon\Providers;

use Illuminate\Support\ServiceProvider;

class JsoonServiceProviders extends ServiceProvider{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    public function register()
    {
        
    }
}