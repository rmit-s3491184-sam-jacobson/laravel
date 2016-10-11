<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = "Session";
    protected $fillable = ['id', 'cinemaId', 'time'];

    public function cinema() {
        return $this->belongsTo('cinema'); // this matches the Eloquent model
    }
    public function ticket() {
        return $this->hasMany('ticket'); // this matches the Eloquent model
    }
}
