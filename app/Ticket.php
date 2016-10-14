<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['type', 'price', 'sessionId'];
    public function session() {
        return $this->belongsTo('Session'); // this matches the Eloquent model
    }

    public function shoppingcart(){
        return $this->belongsTo('ShoppingCart');
    }
}
