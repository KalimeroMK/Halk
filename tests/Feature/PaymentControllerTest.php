<?php

declare(strict_types=1);

namespace Kalimeromk\HalkbankPayment\Tests\Feature;

use Kalimeromk\HalkbankPayment\Tests\TestCase;

final class PaymentControllerTest extends TestCase
{
    public function testItShowsThePaymentForm(): void
    {
        $response = $this->get('payment/100');

        $response->assertOk();
        $response->assertViewIs('payment::payment');
    }

    public function testItHandlesPaymentSuccess(): void
    {
        $response = $this->post('payment/success', ['ReturnOid' => 'test-order-id12345']);

        $response->assertOk();
        $response->assertViewIs('payment::success');
    }

    public function testItHandlesPaymentFailure(): void
    {
        $response = $this->post('payment/fail', [
            'clientIp' => '127.0.0.1',
            'mdErrorMsg' => 'Test error message',
            'ErrMsg' => 'Test error description',
        ]);

        $response->assertOk();
        $response->assertViewIs('payment::fail');
    }
}
