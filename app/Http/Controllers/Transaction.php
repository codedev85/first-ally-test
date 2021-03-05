<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHistory;
class Transaction extends Controller
{
    //
    public function history(){

        $histories = TransactionHistory::where('user_id',auth()->user()->id)->get();

        return view('Transaction.history' , compact('histories'));
    }
}
