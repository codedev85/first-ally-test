<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHistory;
class Transaction extends Controller
{
    //
    public function history(){

        if(auth()->user()->role_id == 1){
          $histories = TransactionHistory::with('user')->get();
        }else{
            $histories = TransactionHistory::where('user_id',auth()->user()->id)->get();
        }


        return view('Transaction.history' , compact('histories'));
    }
}
