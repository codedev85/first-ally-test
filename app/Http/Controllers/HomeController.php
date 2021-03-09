<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Currency as Rate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $currencies = Rate::get();

        if(auth()->user()->role_id == 1){
            $ExRequests = ExchangeRequest::where('payment_status','PENDING PAYMENT')->with('user')->orderby('created_at','desc')->limit(5)->get();
        }else{
            $ExRequests = ExchangeRequest::where('user_id',auth()->user()->id)->where('payment_status','PENDING PAYMENT')->with('user')->orderby('created_at','desc')->limit(5)->get();
        }

        $clientCount = User::where('role_id',2)->count();
        $totalExRequest = ExchangeRequest::pluck('amount_paid')->sum();
        $payoutInpounds =  TransactionHistory::where('currency','Pounds')->pluck('credit_amount')->sum();
        $payoutInDollars =  TransactionHistory::where('currency','Dollars')->pluck('credit_amount')->sum();
        $payoutInEuros =  TransactionHistory::where('currency','Euros')->pluck('credit_amount')->sum();




        return view('home' , compact('ExRequests','payoutInEuros','payoutInDollars','currencies','totalExRequest','clientCount','payoutInpounds'));
    }
}
