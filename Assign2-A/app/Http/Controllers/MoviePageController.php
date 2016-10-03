<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cinema;
use App\Session;
use App\Relational;
use Illuminate\Http\Request;

use App\Http\Requests;

class MoviePageController extends Controller
{
    public function index()
    {
        $movies = Movie::all();


//        return view('movies/index');

        return view('movies/index')->with('movies', $movies);


    }

    public function ticketpage($id)
    {
        $movie = Movie::find($id);
        $relationals = Relational::all();
        $cinemas = Cinema::all();
        $sessions = Session::all();
        return view('movies/ticketpage/index')
            ->with('movie', $movie)
            ->with('relationals', $relationals)
            ->with('cinemas', $cinemas)
            ->with('sessions', $sessions);
    }
}
