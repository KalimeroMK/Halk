# Halkbank Payment Gateway for Laravel
![Halk logo](https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Halkbank_logo.svg/2560px-Halkbank_logo.svg.png)

Integrate Halkbank's online payment gateway seamlessly into your Laravel application with this dedicated package. Designed specifically for Macedonian businesses, this package provides an easy-to-use interface for integrating Halkbank payment services.



## Credits

This package was created by KalimeroMK.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



## Prerequisites

Before you begin, ensure you have the following:
- PHP >= 7.4

## Installation

Follow these steps to install the package:

**Install via Composer**
   Run the following command to install the package:
   ```  
   composer require kalimeromk/halkbank-payment
   ```



## Publish Configurations and Views
```
php artisan vendor:publish --provider="Kalimeromk\HalkbankPayment\HalkBankPaymentServiceProvider"
```
## Configure the Package
Edit the published config/payment.php with your Halkbank credentials and settings.
Usage

## Routes
```
Route::prefix('payment')->group(function () {
    Route::get('/{amount}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/', [PaymentController::class, 'showPaymentForm'])->name('payment.post');
    Route::get('success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
});
```
## Customization

## Views: 
Customize the payment form in resources/views/vendor/payment.
## Controller:
Extend PaymentController to modify or add new payment processing logic.
## Routes:
Add new routes in your Laravel application as needed.
## Halkbank Payment Gateway Configuration .env
````
PAYMENT_CLIENT_ID=
PAYMENT_STORE_KEY=
PAYMENT_STORE_TYPE=
PAYMENT_CURRENCY=807
PAYMENT_TRANSACTION_TYPE=Auth
PAYMENT_OK_URL=http://localhost:87/payment-success
PAYMENT_FAIL_URL=http://localhost:87/payment-fail
PAYMENT_LANG=en
PAYMENT_LAYOUT=

