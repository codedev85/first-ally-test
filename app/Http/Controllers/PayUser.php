<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use App\Models\Bank;

class PayUser extends Controller
{
    //
    public function pay($id){

      $payUser =  ExchangeRequest::where('id',$id)->with('user')->first();
      $banks = Bank::where('user_id',$payUser['user_id'])->get();

      return view('Pay.user',compact('payUser','banks'));

    }

    public function sendPayment(Request $request ,$id){

                request()->validate([
                    'bank' => 'required',
                ]);

        /***
         *
         *
         * Use Bank Payment APi For transfer to actual bank
         *
         * or third party API like Etrazact or SHAGO
         *
         * Debit the admins position and Credit the beneficiary position
         */

       $exactPay =  ExchangeRequest::where('id',$id)->with('user')->first();

       if($exactPay->currency_rate == $request['amount']){
           //credit bank
         $fetchUsersBank =  Bank::where('account_number',$request['bank'])->first();


           $pay =  ExchangeRequest::where('id',$id)->update([
               'payment_status' => 'PAID'
           ]);

           if($pay){
               TransactionHistory::create([
                   'user_id'       =>  $exactPay['user_id'],
                   'credit_amount'  =>  $request['amount'],
                   'TYPE'          => 'CREDIT',
                   'currency'      => $request['currency'],
                   'credited_by'   =>  auth()->user()->email,
               ]);

               toastr()->success('Payment made to'.' ' .$exactPay->user['email']. ' '.'successfully');

               return redirect('/home');
           }
       }

    }
}
