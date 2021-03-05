<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
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

        return view('home' , compact('ExRequests','currencies'));
    }
}
