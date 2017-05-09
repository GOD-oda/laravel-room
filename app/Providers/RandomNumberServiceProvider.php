<?php

namespace App\Providers;

use App\RandomNumber;
use Illuminate\Support\ServiceProvider;

class RandomNumberServiceProvider extends ServiceProvider
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
        $this->app->singleton('FixedRandomNumber', function () {
            return new RandomNumber();
        });
    }
}
