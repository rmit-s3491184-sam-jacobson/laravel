<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'image', 'minutes', 'classification', 'status'];

    protected $table = 'movies';

    public $timestamps = false;
    public function sessionTimes()
    {
        return $this->hasMany('App\Session', 'movie_id');
    }

}
