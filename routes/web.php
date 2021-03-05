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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/pay', [App\Http\Controllers\PaymentController::class ,'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class,'handleGatewayCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add/rate',[App\Http\Controllers\Currency::class,'create'])->name('rate.create');
Route::post('/store/rate',[App\Http\Controllers\Currency::class,'store'])->name('rate.store');

Route::get('currency/exchange',[App\Http\Controllers\Exchange::class,'exchange'])->name('exchange');
Route::post('currency/exchange',[App\Http\Controllers\Exchange::class,'request'])->name('exchange.request');
