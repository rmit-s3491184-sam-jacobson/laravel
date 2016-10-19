<?php

namespace App\Http\Controllers\Admin;

use App\TicketType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if (Auth::check())
        {
            $tickets = TicketType::all();
            return view('backend.tickets.index',compact('tickets'));
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
        return view('backend.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTicketRequest $request)
    {
        TicketType::insert(['type' => $request['type'], 'price' => $request['price']]);


        //return view('backend.movies.index')->with('movies', $movies);
        return redirect('admin/ticket')->with('status', 'A new ticket type has been created!');

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
        $ticket = TicketType::find($id);

        return view('backend.tickets.edit')->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EditTicketRequest $request, $id)
    {
        $ticket = TicketType::findOrFail($id);

        $input = $request->all();

        $ticket->fill($input)->save();


        return redirect('admin/ticket')->with('status', 'Ticket Editing Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TicketType::destroy($id);

        return redirect('admin/ticket')->with('status', 'Ticket Successfully Deleted');
    }
}
