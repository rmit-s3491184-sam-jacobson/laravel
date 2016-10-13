<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Cinema;
use App\Session;
use App\Http\Requests;



class MoviePageController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies/index')->with('movies', $movies);


    }

    public function ticketpage($id)
    {
        $movie = Movie::find($id);
        $cinemas = Cinema::all();
        $sessions = Session::all();
        return view('movies/ticketpage/index')
            ->with('cinemas', $cinemas)
            ->with('sessions', $sessions)
            ->with('movie', $movie);
    }

    public function search()
    {
        $searchString = $_GET['Search'];
        $movie = Movie::where('title', 'LIKE', "%$searchString%")->get();
        return view('movies/searchResult')
            ->with('movie', json_decode($movie, true));
    }
}
