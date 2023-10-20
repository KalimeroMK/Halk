<?php
namespace Kalimeromk\HalkBankPayment;

use Illuminate\Support\ServiceProvider;

class HalkBankPaymentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'payment');
        $this->publishes([
            __DIR__ . '/Config/payment.php' => config_path('payment.php'),
            __DIR__ . '/resources/views' => resource_path('views/vendor/payment'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/payment.php', 'payment'
        );
    }

}