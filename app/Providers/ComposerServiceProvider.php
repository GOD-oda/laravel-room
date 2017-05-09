<?php

namespace App\Providers;

use App\Http\ViewComposers\NoticeComposer;
use App\Http\ViewComposers\PaymentTypeComposer;
use Illuminate\Support\ServiceProvider;
use View;

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
            NoticeComposer::class      => ['articles.elements.notice'],
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
