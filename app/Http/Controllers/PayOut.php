<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
use Illuminate\Http\Request;

class PayOut extends Controller
{
    //
    public function allPayout(){

        $ExRequests = ExchangeRequest::where('payment_status','PENDING PAYMENT')->orderby('created_at','desc')->simplePaginate(10);

        return view('Payout.request' , compact('ExRequests'));
    }

    public function history(){

        $ExRequests = ExchangeRequest::orderby('created_at','desc')->simplePaginate(10);

        return view('Payout.request-history' , compact('ExRequests'));
    }
}
