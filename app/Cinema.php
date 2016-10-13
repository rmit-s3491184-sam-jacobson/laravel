<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cinema extends Model
{
    protected $table = 'cinemas';
    protected $fillable = ['name', 'address'];
    public $timestamps = false;

    public function session()
    {
        return $this->hasMany('App\Session', 'cinema_id');
    }
}


