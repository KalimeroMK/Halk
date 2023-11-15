# Halkbank Payment Gateway for Laravel

Integrate Halkbank's online payment gateway seamlessly into your Laravel application with this dedicated package. Designed specifically for Macedonian businesses, this package provides an easy-to-use interface for integrating Halkbank payment services.

## Credits

This package was created by KalimeroMK.

## License

The MIT License (MIT). Please see License File for more information.


## Prerequisites

Before you begin, ensure you have the following:
- PHP >= 7.4

## Installation

Follow these steps to install the package:

1. **Install via Composer**
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
```Initiate Payment: /payment/{amount}
Payment Success: /payment/success
Payment Failure: /payment/fail
Payment Form
Access the payment form by navigating to /payment/{amount}.
Handling Responses
Success: PaymentController@paymentSuccess
Failure: PaymentController@paymentFail
```
## Customization

Views: Customize the payment form in resources/views/vendor/payment.
Controller: Extend PaymentController to modify or add new payment processing logic.
Routes: Add new routes in your Laravel application as needed.
Configuration: Update config/payment.php for any changes in payment parameters.

