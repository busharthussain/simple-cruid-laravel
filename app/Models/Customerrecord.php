<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customerrecord extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','customer_id','quantity','total_price'];
}
