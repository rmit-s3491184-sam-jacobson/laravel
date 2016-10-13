<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
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

        $join = Session::where('movie_id', "$id")
            ->join('cinemas', 'cinemas.id', '=', 'sessions.cinema_id')
            ->get();

        return view('movies/ticketpage/index')
            ->with('cinemas', $cinemas)
            ->with('sessions', $sessions)
            ->with('movie', $movie)
            ->with('join', $join);
    }


    public function search()
    {
        $searchString = $_GET['Search'];
        if ($searchString != '')
        {
            $movie = Movie::where('title', 'LIKE', "%$searchString%")->get();
        }
        else
        {
            $movie = 1;
        }
        $cinema = 1;

        return view('movies/searchResult')
            ->with('movie', json_encode($movie, true))
            ->with('cinema', $cinema);
    }

    public function cinemaSearch()
    {
        $searchString = $_POST['Search'];
        if ($searchString != '')
        {
            $cinema = Cinema::where('name', 'LIKE', "%$searchString%")->get();
        }
        else
        {
            $cinema = 1;
        }
        $movie = 1;
        return view('movies/searchResult')
            ->with('cinema', json_encode($cinema, true))
            ->with('movie', $movie);
    }
    public function cart()
    {
        $formData = array(
            'cinema'  => Input::get('cinema'),
            'sesh'  => Input::get('sesh'),
            'adultCount' => Input::get('adultCount'),
            'concessionCount' => Input::get('concessionCount'),
            'childCount' => Input::get('childCount')
        );
        $cinemaDetails = Cinema::find($formData['cinema']);
        $session = Session::find($formData['sesh']);
        $movieId = $session->movie_id;
        $movieTitle = Movie::find($movieId);
        $adultCount = $_POST['adultCount'];
        $concessionCount = $_POST['concessionCount'];
        $childCount = $_POST['childCount'];
        $cost = ($adultCount*15)+($concessionCount*10)+($childCount*5);
        $count = $adultCount + $concessionCount + $childCount;
        return view('movies/ticketpage/cart')
            ->with('formData', $formData)
            ->with('cinemaDetails', $cinemaDetails)
            ->with('session', $session)
            ->with('movieTitle', $movieTitle)
            ->with('cost', $cost)
            ->with('count', $count);
    }



}
