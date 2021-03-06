<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/',[App\Http\Controllers\Auth\CustomLoginController::class, 'loginPage'])->name('welcome');

Route::post('/auth-login', [App\Http\Controllers\Auth\CustomLoginController::class, 'authenticate'])->name('auth-login');

Route::group(['middleware' => ['auth'] ], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('currency/exchange', [App\Http\Controllers\Exchange::class, 'exchange'])->name('exchange');
    Route::get('currency/exchange/history', [App\Http\Controllers\Exchange::class, 'exchangeHistory'])->name('exchange.history');
    Route::post('currency/exchange', [App\Http\Controllers\Exchange::class, 'request'])->name('exchange.request');
    Route::get('/transaction/history', [App\Http\Controllers\Transaction::class, 'history'])->name('transaction.history');
    Route::get('/add/bank', [App\Http\Controllers\Bank::class, 'add'])->name('add.bank');
    Route::post('/store/bank', [App\Http\Controllers\Bank::class, 'store'])->name('store.bank');
    Route::get('/my-bank', [App\Http\Controllers\Bank::class, 'myBank'])->name('my.bank');
    Route::group(['middleware' => ['admin'] ], function() {
        Route::get('/add/rate', [App\Http\Controllers\Currency::class, 'create'])->name('rate.create');
        Route::post('/store/rate', [App\Http\Controllers\Currency::class, 'store'])->name('rate.store');
        Route::get('/make/payment/{id}', [App\Http\Controllers\PayUser::class, 'pay'])->name('pay.user');
        Route::post('/pay/user/{id}', [App\Http\Controllers\PayUser::class, 'sendPayment'])->name('pay.user.payment');
        Route::get('/all/payout/request', [App\Http\Controllers\PayOut::class, 'allPayout'])->name('pay.out');
        Route::get('/all/payout/list', [App\Http\Controllers\PayOut::class, 'history'])->name('pay.out.history');
    });
});
