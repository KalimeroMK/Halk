<?php

namespace Kalimeromk\HalkbankPayment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Displays the payment form to the user.
     *
     * This method is responsible for preparing and displaying the payment form to the user.
     * It retrieves various configuration values such as client ID, URLs, transaction type, store key, language, and currency.
     * It also generates a unique hash value based on these configuration values and the amount to be paid.
     * This hash value is used for security purposes during the payment process.
     * Finally, it returns the 'payment::payment' view with all these values.
     *
     * @param  int  $amount  The amount to be paid.
     * @return View  The view instance for the payment form page.
     */
    public function showPaymentForm(int $amount)
    {
        $clientId = config('payment.client_id');
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

        return view(
            'payment::payment',
            compact(
                'clientId',
                'amount',
                'oid',
                'okUrl',
                'failUrl',
                'transactionType',
                'instalment',
                'rnd',
                'storekey',
                'storetype',
                'lang',
                'currencyVal',
                'hash'
            )
        );
    }

    /**
     * Handles the successful payment response from the payment gateway.
     *
     * This method is responsible for handling the successful payment response from the payment gateway.
     * It retrieves the order ID from the request, which is returned by the payment gateway upon successful payment.
     * The order ID is then passed to the 'payment::success' view to be displayed to the user.
     *
     * @param  Request  $request  The HTTP request instance containing the payment gateway's response data.
     * @return View     The view instance for the successful payment page.
     */
    public function paymentSuccess(Request $request)
    {
        $orderId = $request->input('ReturnOid');
        return view('payment::success', compact('orderId'));
    }

    /**
     * Handles the failed payment response from the payment gateway.
     *
     * This method is responsible for handling the failed payment response from the payment gateway.
     * It retrieves the client IP, MD error message, and error message from the request, which are returned by the payment gateway upon failed payment.
     * These details are then passed to the 'payment::fail' view to be displayed to the user.
     *
     * @param  Request  $request  The HTTP request instance containing the payment gateway's response data.
     * @return View     The view instance for the failed payment page.
     */
    public function paymentFail(Request $request)
    {
        $clientIp = $request->input('clientIp');
        $mdErrorMsg = $request->input('mdErrorMsg');
        $errMsg = $request->input('ErrMsg');
        return view('payment::fail', compact('clientIp', 'mdErrorMsg', 'errMsg'));
    }
}
