<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ['movie_id', 'cinema_id', 'session_time','cost'];
}
