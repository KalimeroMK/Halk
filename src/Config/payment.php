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
    'client_id' => '180000093',
    'store_key' => 'TEMP0151',
    'store_type' => '3D_PAY_HOSTING',
    'currency' => '807',
    'transaction_type' => 'Auth',
    'ok_url' => 'http://localhost:87/payment-success',
    'fail_url' => 'http://localhost:87/payment-fail',
    'lang' => 'en',
    'layout' => '',
];
