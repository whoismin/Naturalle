<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'placed_on', 'name', 'number', 'address', 'method', 'total_products', 'total_price', 'ong', 'payment_status'];
}
