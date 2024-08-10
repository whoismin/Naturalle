<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'number',
        'email',
        'method',
        'address',
        'total_products',
        'total_price',
        'placed_on',
        'payment_status',
        'ong'
    ];
}
