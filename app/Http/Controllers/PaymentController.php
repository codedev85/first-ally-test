<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\ExchangeRequest;
use Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();




//        dd($paymentDetails['data']['metadata']);
        $status                 = $paymentDetails['data']['gateway_response'];
        $ref                    = $paymentDetails['data']['reference'];
        $amount                 = $paymentDetails['data']['amount']/100;
        $paid_at                = $paymentDetails['data']['paid_at'];
        $channel                = $paymentDetails['data']['channel'];
        $userId                 =  $paymentDetails['data']['metadata']['user_id'];
        $paybackCurrency        = $paymentDetails['data']['metadata']['currency'];
        $accountOptions         = $paymentDetails['data']['metadata']['acountOptions'];
        $convertedRate          = $paymentDetails['data']['metadata']['convertedRate'];


        $moneyExchange = new ExchangeRequest();
        $moneyExchange->status = $status;
        $moneyExchange->refs = $ref;
        $moneyExchange->amount_paid = $amount;
        $moneyExchange->channel = $channel;
        $moneyExchange->user_id =$userId;
        $moneyExchange->currency_conversion = $paybackCurrency;
        $moneyExchange->currency_rate =  $convertedRate;
        $moneyExchange->account_options = $accountOptions;

        $moneyExchange->save();


        if($moneyExchange){

            TransactionHistory::create([
                'user_id'       =>  auth()->user()->id,
                'debit_amount'  =>  $amount,
                'TYPE'          => 'DEBIT',
                'currency'      => 'NGN'
            ]);
            toastr()->success('Payment made successfully');

            return redirect('/home');
        }
    }

}
