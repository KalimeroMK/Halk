<?php

declare(strict_types=1);

namespace Kalimeromk\HalkbankPayment\Tests;

use Kalimeromk\HalkbankPayment\HalkBankPaymentServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [HalkBankPaymentServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // the csrf_exempt middleware resolves the encrypter, which needs a key
        $app['config']->set('app.key', 'base64:' . base64_encode(random_bytes(32)));

        $app['config']->set('view.paths', array_merge(
            $app['config']->get('view.paths', []),
            [__DIR__ . '/stubs/views'],
        ));
    }
}
