<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\ExchangeRequest;
use Session;

class Exchange extends Controller
{
    public function exchange(){

        $currencies = Currency::get();

        return view('Payment.request-exchange', compact('currencies'));
    }

    public function request(Request $request){

        request()->validate([
                    'rate' => 'required',
                    'currency' => 'required',
                    'account' => 'required',
                ]);

        $amount   = $request['rate'];
        $currency = $request['currency'];
        $account  = $request['account'];


        $Currencyrate = Currency::where('currency',$currency)->first();

        session(['amount_sess' => $amount, 'currency_sess'=> $currency,'account_sess' => $account]);

        return  view('Payment.confirm-payment', compact('Currencyrate'));
    }

    public function exchangeHistory(){

        $ExRequests = ExchangeRequest::where('user_id',auth()->user()->id)->orderby('created_at','desc')->simplePaginate(10);

        return view('Payment.request-exchange-history' , compact('ExRequests'));
    }
}
