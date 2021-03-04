<?php
namespace App\Classes;
use Illuminate\Support\Facades\DB;

class Wallet {

    public static function generateAccountNumber()
    {
        $no = (string) random_int(00000000, 99999999);
        $no = "17$no";

        if ( strlen($no) != 10 ) {
            return self::generateAccountNumber();
        }

        if ( \App\Models\Wallet::where('account_number', $no)->count() > 0 ) {
            return self::generateAccountNumber();
        }

        return $no;
    }
}
