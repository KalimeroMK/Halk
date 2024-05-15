<?php

namespace Kalimeromk\HalkbankPayment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Kalimeromk\HalkbankPayment\Middleware\CsrfExemptMiddleware;

class HalkBankPaymentServiceProvider extends ServiceProvider
{
     /**
     * Boots the service provider.
     *
     * This method is responsible for booting the service provider.
     * It registers a custom middleware 'csrf_exempt' using the provided router instance.
     * It also loads routes from the 'routes.php' file and views from the 'resources/views' directory.
     * Additionally, it publishes the 'payment.php' configuration file and the views to the appropriate paths.
     *
     * @param  Router  $router  The router instance.
     * @return void
     */
    public function boot(Router $router): void
    {
        // Register the custom 'csrf_exempt' middleware.
        $router->aliasMiddleware('csrf_exempt', CsrfExemptMiddleware::class);

        // Load routes from the 'routes.php' file.
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Load views from the 'resources/views' directory.
        $this->loadViewsFrom(__DIR__.'/resources/views', 'payment');

        // Publish the 'payment.php' configuration file to the config path.
        $this->publishes([
            __DIR__.'/Config/payment.php' => config_path('payment.php'),
        ], 'config');

        // Publish the views to the 'views/vendor/payment' path.
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/payment'),
        ], 'views');
    }

    /**
     * Registers the service provider.
     *
     * This method is responsible for registering the service provider.
     * It merges the 'payment.php' configuration file from the package's config directory with the user's existing 'payment' configuration.
     * This allows the user to override the package's default configuration values with their own values defined in their 'payment' configuration file.
     *
     * @return void
     */
    public function register(): void
    {
        // Merges the 'payment.php' configuration file from the package's config directory with the user's existing 'payment' configuration.
        $this->mergeConfigFrom(
            __DIR__.'/Config/payment.php',
            'payment'
        );
    }
}
