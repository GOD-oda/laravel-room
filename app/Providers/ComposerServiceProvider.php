<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\NoticeComposer;
use App\Http\ViewComposers\PaymentTypeComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers([
            PaymentTypeComposer::class => ['admin.payment.index', 'admin.payment.create'],
            NoticeComposer::class => ['articles.elements.notice']
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
