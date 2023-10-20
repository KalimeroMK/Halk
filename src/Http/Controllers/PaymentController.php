<?php

namespace Kalimeromk\HalkbankPayment\Http\Controllers;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $clientId = config('payment.client_id');
        $amount = "9.95";
        $oid = ""; // Order Id. This can be generated dynamically if needed.
        $okUrl = config('payment.ok_url');
        $failUrl = config('payment.fail_url');
        $transactionType = config('payment.transaction_type');
        $instalment = "";
        $rnd = microtime();
        $storekey = config('payment.store_key');
        $storetype = config('payment.store_type');
        $lang = config('payment.lang');
        $currencyVal = config('payment.currency');

        $hashstr = $clientId.$oid.$amount.$okUrl.$failUrl.$transactionType.$instalment.$rnd.$storekey;
        $hash = base64_encode(pack('H*', sha1($hashstr)));

        return view('payment::payment',
            compact('clientId', 'amount', 'oid', 'okUrl', 'failUrl', 'transactionType', 'instalment', 'rnd', 'storekey',
                'storetype', 'lang', 'currencyVal', 'hash'));
    }

    public function paymentSuccess()
    {
        return 'raboti';
    }

    public function paymentFail()
    {
        return 'ne';
    }
}
