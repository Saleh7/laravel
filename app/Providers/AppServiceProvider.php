<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $logger = Log::getMonolog();
        if (is_null($logger) === false) {
            foreach ($logger->getHandlers() as $handler) {
                $handler->setLevel(config('app.log_level')); // Set the log level based on the config setting
            }
        }
    }
}
