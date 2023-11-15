# Halkbank Payment Gateway for Laravel

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

Views: Customize the payment form in resources/views/vendor/payment.
Controller: Extend PaymentController to modify or add new payment processing logic.
Routes: Add new routes in your Laravel application as needed.
Configuration: Update config/payment.php for any changes in payment parameters.

