<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton(\App\Article::class, function() {
            return new \App\Article();
        });
    }
}
