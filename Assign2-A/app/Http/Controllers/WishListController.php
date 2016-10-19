<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\WishList;

use App\Movie;

use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check())
        {
        $products= WishList::where('user_id','=',Auth::id())->
            orderBy('id','DESC')->paginate(5);
        return view('wishlist.index',compact('products')) ->with('i', ($request->input('page', 1) - 1) * 5);
        }

        else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
        {
        $upComingMovies= Movie::where('status','=','coming soon')->get();
        return view('wishlist.create',compact('upComingMovies'));
        }

        else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'user_name' => 'required',
        'movie_title' => 'required',
    ]);
//        WishList::create($request->all());
        $WishList = new WishList;
        $WishList->user_name = $request->input('user_name');
        $WishList->user_id = Auth::id();
        $WishList->movie_title = $request->input('movie_title');
        $WishList->save();

        return redirect()->route('wishlist.index') ->with('success','Wish list created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= WishList::find($id);
        return view('wishlist.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= WishList::find($id);
        if ($product->user_id == Auth::id()) {
            return view('wishlist.edit', compact('product'));
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_name' => 'required',
        ]);
        WishList::find($id)->update($request->all());
        return redirect()->route('wishlist.index') ->with('success','Wish list updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WishList::find($id)->delete();
        return redirect()->route('wishlist.index') ->with('success','Wish list deleted successfully');
    }
}
