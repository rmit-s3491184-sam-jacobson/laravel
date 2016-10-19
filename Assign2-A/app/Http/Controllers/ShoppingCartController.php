<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests\PaymentValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $total=Cart::total();
        return view('shoppingcart.index',compact('tickets','total'));
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
    public function store(Requests\PaymentValidation $request)
    {
        /*$validator = Validator::make($request->all(), [
            'cardNo' => 'required|min:17|max:19',
            'CVV' => 'required|integer',
            'expire'=> 'required',
            'name' => 'required|string',
            'address' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect('back')
                ->withErrors($validator);
        }*/
        $tickets=Cart::content();

        foreach ($tickets as $ticket) {
            $Ticket = new Ticket;
            $Ticket->type = $ticket->options->ticketType;
            $Ticket->price = $ticket->price;
            $Ticket->movieName = $ticket->name;
            $Ticket->sessionTime = $ticket->options->session;
            $Ticket->cinemaName = $ticket->options->cinemaName;
            $Ticket->qty = $ticket->qty;
            $Ticket->userId = Auth::id();
            $Ticket->save();
        }
        Cart::destroy();
        return view('movies/ticketpage/paymentrecieved');
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
            Cart::get($id)->options->subtotal = ($Qty * 15);
        }
        elseif(Cart::get($id)->options->ticketType == 'concession')
        {
            Cart::get($id)->options->subtotal = ($Qty* 10);
        }
        else
        {
            Cart::get($id)->options->subtotal = ($Qty * 5);
        }
        $tickets=Cart::content();
        $total=Cart::subtotal();
        return view('shoppingcart.index',compact('tickets','total'));

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
