<?php

use Illuminate\Support\Facades\Route;
use Kalimeromk\HalkbankPayment\Http\Controllers\PaymentController;

Route::prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/', [PaymentController::class, 'showPaymentForm'])->name('payment.post');
    Route::get('success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
});