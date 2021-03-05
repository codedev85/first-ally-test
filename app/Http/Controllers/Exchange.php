<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Currency;
use Session;

class Exchange extends Controller
{
    public function exchange(){

        $currencies = Currency::get();

        return view('Payment.request-exchange', compact('currencies'));
    }

    public function request(Request $request){

        $amount   = $request['rate'];
        $currency = $request['currency'];
        $account  = $request['account'];


        $Currencyrate = Currency::where('currency',$currency)->first();

        session(['amount_sess' => $amount, 'currency_sess'=> $currency,'account_sess' => $account]);

        return  view('Payment.confirm-payment', compact('Currencyrate'));
    }
}
