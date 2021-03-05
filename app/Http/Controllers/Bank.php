<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank as BankDetails;

class Bank extends Controller
{
    //
    public function add(){

        return view('Bank.add');
    }

    public function store(Request $request){

       $data =  request()->validate([
                        'account_name'=> 'required',
                        'account_number' => 'required',
                        'bank_name' => 'required'
                    ]);
       $bankDetails  =   array_merge($data, ['user_id' => auth()->user()->id]);

       $bank =   BankDetails::create($bankDetails);

       if($bank){

           toastr()->success('Bank details added successfully');

           return  back();
       }

    }

    public function myBank(){

        $banks = BankDetails::where('user_id',auth()->user()->id)->get();

        return view('Bank.my-banks',compact('banks'));
    }
}
