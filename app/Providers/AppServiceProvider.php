<?php

namespace App\Providers;

use App\DataAccess\Cache\DataCache;
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
        $this->app->bind(
            \App\Repositories\ArticleRepositoryInterface::class,
            function ($app) {
                return new \App\Repositories\ArticleRepository(
                    new \App\DataAccess\Eloquent\Article,
                    new DataCache($app['cache'], 'article', 120)
                );
            }
        );

        $this->app->bind(
            \App\Repositories\TagRepositoryInterface::class,
            \App\Repositories\TagRepository::class
        );
    }
}
