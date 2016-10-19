<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['movie_id', 'cinema_id', 'session_time'];
    public $timestamps = false;
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
    public function cinema()
    {
        return $this->belongsTo('App\Cinema');
    }

    public function shoppingcart()
    {
        return $this->belongsTo('App\ShoppingCart');
    }
}
