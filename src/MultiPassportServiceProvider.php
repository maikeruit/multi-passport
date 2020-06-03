<?php

namespace Sumatoreo\MultiPassport;

use Illuminate\Support\ServiceProvider;

class MultiPassportServiceProvider extends ServiceProvider
{
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/database/migrations');

            $this->publishes([
                __DIR__.'/config/multipassport.php' => config_path('multipassport.php'),
            ], 'multipassport-config');

            $this->publishes([
                __DIR__.'/database/migrations' => database_path('migrations'),
            ], 'multipassport-migrations');
        }
    }
}