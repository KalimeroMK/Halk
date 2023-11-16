<?php

namespace Kalimeromk\HalkbankPayment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Kalimeromk\HalkbankPayment\Middleware\CsrfExemptMiddleware;

class HalkBankPaymentServiceProvider extends ServiceProvider
{
    public function boot(Router $router): void
    {
        // Register your custom middleware
        $router->aliasMiddleware('csrf_exempt', CsrfExemptMiddleware::class);

        // Other initialization code...
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
        // Your existing register method code...
        $this->mergeConfigFrom(
            __DIR__.'/Config/payment.php',
            'payment'
        );
    }
}
