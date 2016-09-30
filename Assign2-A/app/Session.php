<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = "Session";
    protected $fillable = ['id', 'cinemaId', 'time'];

    public function cinema() {
        return $this->belongsTo('cinema');
    }
    public function ticket() {
        return $this->hasMany('ticket');
    }

    public function relational() {
        return $this->hasOne('Cinemasession'); // this matches the Eloquent model
    }
}
