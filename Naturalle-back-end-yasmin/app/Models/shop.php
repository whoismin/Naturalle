<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'pid', 'name', 'price', 'image'];
}

class Cart extends Model
{
    protected $fillable = ['user_id', 'pid', 'name', 'price', 'quantity', 'image'];
}

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image'];
}
