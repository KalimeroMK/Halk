<?php

use Illuminate\Support\Facades\Route;
use Kalimeromk\HalkbankPayment\Http\Controllers\PaymentController;

Route::prefix('payment')->group(function () {
    Route::get('/{amount}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/', [PaymentController::class, 'showPaymentForm'])->name('payment.post');
    Route::post('success', [PaymentController::class, 'paymentSuccess'])->name('payment.success')->middleware('csrf_exempt');
    Route::post('fail', [PaymentController::class, 'paymentFail'])->name('payment.fail')->middleware(['csrf_exempt']);
});