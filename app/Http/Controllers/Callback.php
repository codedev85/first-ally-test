<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Callback extends Controller
{
    public function callback(){
        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if(!$reference){
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_test_a2149b38e97f46a92299d2a0e5e77520d3dc6ac8",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

        if(!$tranx->status){
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        if('success' == $tranx->data->status){
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
            echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
        }
    }
}
