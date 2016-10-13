<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        $id = 1;
        $session = Session::where('movieId', '=', $id)-get();
        $cinemas = Cinema::all();


        return view('backend.movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateMovieRequest $request)
    {
       /* Movie::insert(['title' => $request['title'], 'description' => $request['description'], 'image' => $request['image'],
            'minutes' => $request['minutes'], 'actors' => $request['actors'], 'directors' => $request['directors'], 'classification' => $request['classification']]);*/

        $movie = new Movie(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'minutes' => $request->get('minutes'),
            'actors' => $request->get('actors'),
            'directors' => $request->get('directors'),
            'classification' => $request->get('classification')
        ));
        $movie->save();

        if( $request->hasFile('image') ) {

            $imageName = $movie->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/movies/', $imageName);

            $movie->image = '/images/movies/' . $imageName;
            Image::make(public_path() . $movie->image)->resize(370, 350)->save();
            $movie->save();
        }

        //return view('backend.movies.index')->with('movies', $movies);
        return redirect('admin/movie')->with('status', 'A new movie has been created!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('backend.movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EditMovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'minutes' => $request->get('minutes'),
            'actors' => $request->get('actors'),
            'directors' => $request->get('directors'),
            'classification' => $request->get('classification')
        ));

        if( $request->hasFile('image') ) {

            $imageName = $movie->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/movies/', $imageName);

            $movie->image = '/images/movies/'. $imageName;
            Image::make(public_path() . $movie->image)->resize(370,350)->save();
            $movie->save();
            return redirect('admin/movie')->with('status', 'Movie with image Editing Successful');
        }

        return redirect('admin/movie')->with('status', 'Movie Editing Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);

        return redirect('admin/movie')->with('status', 'Movie Successfully Deleted');
    }
}
