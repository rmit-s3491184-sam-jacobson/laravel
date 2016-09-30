<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relational extends Model
{
    protected $table = "Relational";
    protected $fillable = ['id', 'movieId', 'cinemaId', 'sessionId', 'time', 'cinema',];
    public function cinema() {
        return $this->hasOne('Cinema'); // this matches the Eloquent model
    }

    public function movie() {
        return $this->hasOne('Movie'); // this matches the Eloquent model
    }

    public function session() {
        return $this->hasOne('Session'); // this matches the Eloquent model
    }
}
