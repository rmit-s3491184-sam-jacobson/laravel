<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'image', 'minutes', 'actors', 'directors', 'classification', 'status'];
    public function cinema() {
        return $this->belongToMany('Cinema'); // this matches the Eloquent model
    }
    public function relational() {
        return $this->hasMany('Cinemasession'); // this matches the Eloquent model
    }

}
