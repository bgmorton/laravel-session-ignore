<?php

namespace bgmorton\LaravelSessionIgnore;

use Illuminate\Contracts\Http\Kernel;
use bgmorton\LaravelSessionIgnore\Http\Middleware\LaravelSessionIgnoreMiddleware;
use Illuminate\Support\ServiceProvider;

class LaravelSessionIgnoreServiceProvider extends ServiceProvider
{

    public function register()
    {
    $this->mergeConfigFrom(__DIR__.'/../config/laravel-session-ignore.php', 'laravel-session-ignore');
    }

    public function boot(Kernel $kernel)
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/laravel-session-ignore.php' => config_path('laravel-session-ignore.php'),
            ], 'config');

        }

    $kernel->pushMiddleware(LaravelSessionIgnoreMiddleware::class);
    }
}