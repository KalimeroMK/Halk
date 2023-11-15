<?php

namespace Kalimeromk\HalkbankPayment;

use Illuminate\Support\ServiceProvider;

class HalkBankPaymentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'payment');
        $this->publishes([
            __DIR__.'/Config/payment.php' => config_path('payment.php'),
        ], 'config');
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/payment'),
        ], 'views');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/payment.php',
            'payment'
        );
    }

}
