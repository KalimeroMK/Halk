<?php

namespace Kalimeromk\HalkbankPayment\tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PaymentControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_shows_the_payment_form()
    {
        $response = $this->get('payment/100');

        $response->assertStatus(200);
        $response->assertViewIs('payment::payment');
    }

    /** @test */
    public function it_handles_payment_success()
    {
        $mockData = [
            'ReturnOid' => 'test-order-id12345'
        ];

        $response = $this->post('/payment/success', $mockData);

        $response->assertStatus(200);
        $response->assertViewIs('payment::success');
    }

    /** @test */
    public function it_handles_payment_failure()
    {
        $mockData = [
            'clientIp' => '127.0.0.1',
            'mdErrorMsg' => 'Test error message',
            'ErrMsg' => 'Test error description'
        ];

        $response = $this->post('/payment/fail', $mockData);

        $response->assertStatus(200);
        $response->assertViewIs('payment::fail');
    }
}
