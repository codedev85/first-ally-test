<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRequest extends Model
{
    use HasFactory;
    protected $table = 'exchange_requests';
    protected $guarded = ['id'];
}
