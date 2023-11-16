<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bank Payment Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file provides a centralized place to set up values for
    | the bank payment gateway integration.
    |
    | 'client_id'       : Merchant ID provided by the bank.
    | 'store_key'       : Store key value defined by the bank.
    | 'store_type'      : Authentication model, e.g., '3D_PAY_HOSTING'.
    | 'currency'        : Currency code. ISO_4217 standard. Example: '949' for TL.
    | 'transaction_type': Type of transaction, e.g., 'Auth'.
    | 'ok_url'          : URL to redirect to if authentication is successful.
    | 'fail_url'        : URL to redirect to if authentication fails.
    | 'lang'            : Language parameter ('tr' for Turkish, 'en' for English).
    | 'layout'          : Location of the master blade file for views.
    |
    |   Credit Card Number : 4125552874276464
    |   Expiration Date:08/25
    |   CVC2 / CVV2 Number: 576
    |   3D Secure Password: a
    */
    'client_id' => env('PAYMENT_CLIENT_ID', 'default_client_id'),
    'store_key' => env('PAYMENT_STORE_KEY', 'default_store_key'),
    'store_type' => env('PAYMENT_STORE_TYPE', '3D_PAY_HOSTING'),
    'currency' => env('PAYMENT_CURRENCY', '807'),
    'transaction_type' => env('PAYMENT_TRANSACTION_TYPE', 'Auth'),
    'ok_url' => env('PAYMENT_OK_URL', 'http://localhost:8080/payment/success'),
    'fail_url' => env('PAYMENT_FAIL_URL', 'http://localhost:8080/payment/fail'),
    'lang' => env('PAYMENT_LANG', 'en'),
    'layout' => env('PAYMENT_LAYOUT', 'layouts.app'),
    'exempt_uris' => [
        'payment/success',
        'payment/fail',
    ]
];
