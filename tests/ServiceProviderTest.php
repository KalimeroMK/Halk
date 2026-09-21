<?php

declare(strict_types=1);

namespace Kalimeromk\HalkbankPayment\Tests;

use Kalimeromk\HalkbankPayment\Middleware\CsrfExemptMiddleware;

final class ServiceProviderTest extends TestCase
{
    public function testEverythingDeclaredForAutoDiscoveryExists(): void
    {
        $manifest = json_decode((string) file_get_contents(__DIR__ . '/../composer.json'), true);

        foreach ($manifest['extra']['laravel']['providers'] ?? [] as $provider) {
            $this->assertTrue(class_exists($provider), $provider . ' is declared but does not exist');
        }
    }

    public function testThePackageDefaultsAreMergedWithoutPublishing(): void
    {
        $this->assertSame('3D_PAY_HOSTING', config('payment.store_type'));
        $this->assertSame(['payment/success', 'payment/fail'], config('payment.exempt_uris'));
    }

    public function testTheCsrfExemptMiddlewareIsAliased(): void
    {
        $aliases = $this->app['router']->getMiddleware();

        $this->assertArrayHasKey('csrf_exempt', $aliases);
        $this->assertSame(CsrfExemptMiddleware::class, $aliases['csrf_exempt']);
    }
}
