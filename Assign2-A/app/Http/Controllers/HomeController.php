<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function mybooking()
    {
        if (Auth::check())
        {   $userId=Auth::id();
            $tickets = Ticket::where('userId','=',$userId)->get();
            return view('mybooking.index',compact('tickets'));
        }
        else{
            return redirect('/login');
        }
    }


}
