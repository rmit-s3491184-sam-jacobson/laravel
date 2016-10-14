<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Http\RedirectResponse;

use Cart;
class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all the tickets in shopping cart
        $tickets=Cart::content();
        return view('shoppingcart.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('movies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $ticket= Cart::get($id);
        return view('shoppingcart.edit',compact('ticket'));
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
            'qty'	=> 'required|integer',
        ]);
        $Qty=$request->input('qty');
        Cart::update($id, $Qty);
        if(Cart::get($id)->options->ticketType == 'adult')
        {
            Cart::get($id)->price = ($Qty * 15);
        }
        elseif(Cart::get($id)->options->ticketType == 'concession')
        {
            Cart::get($id)->price = ($Qty* 10);
        }
        else
        {
            Cart::get($id)->price = ($Qty * 5);
        }
        return redirect('shoppingcart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->route('shoppingcart.index');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->route('shoppingcart.index');
    }
}
