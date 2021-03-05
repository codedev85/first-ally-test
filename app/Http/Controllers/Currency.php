<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency as Exchangerate;
class Currency extends Controller
{
    public function create(){

        return view('Rate.create');
    }

    public function store(Request $request){

        $data = request()->validate([
                            'currency' => 'required',
                            'rate'     => 'required'
                          ]);

      $rate = ExchangeRate::create($data);

      if($rate){
          toastr()->success('Currency rate Added Successfully');
          return back();
      }

    }
}
