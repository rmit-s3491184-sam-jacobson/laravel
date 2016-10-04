<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $table = "Cinema";
    protected $fillable = ['id', 'movieId', 'cinema'];

    public function movie() {
        return $this->belongToMany('Movie'); // this matches the Eloquent model
    }
    public function session(){
        return $this->hasMany('Session');
    }

}
