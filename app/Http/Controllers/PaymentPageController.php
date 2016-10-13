<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentValidation;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class PaymentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentRecieved()
    {


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'cardNo' => 'required|max:19',
//            'CVV' => 'required|max:3',
//            'name' => 'required',
//            'address' => 'required'
//        ]);
        $validator = Validator::make($request->all(), [
            'cardNo' => 'required|max:19',
            'CVV' => 'required|max:3',
            'name' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {

            return redirect('movies/ticketpage/paymentdenied')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            return view('movies/ticketpage/paymentrecieved');
        }
    }
    public function denied()
    {
        return view('movies/ticketpage/paymentdenied');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
