<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Kes;
use \App\Invoice;

class invoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 'admin') {
            
        $invoices = Invoice::all();
        return view('invoices.index')->with('invoices', $invoices);
        
        }elseif(Auth::user()->role == 'lawyer'){
        $lawyer_id = Auth::user()->id;
        $invoices = Invoice::all()->where('user_id', $lawyer_id);
        return view('invoices.index')->with('invoices', $invoices);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lawyer_id = Auth::user()->id;
        $keskes = Kes::all()->where('user_id', $lawyer_id);
        return view('invoices.create')->with('keskes', $keskes);
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
        $this->validate($request, [
            'kes_id' => 'required',
            'user_id' => 'required',
        ]);
        // Create a Case
        $invoice = new Invoice;
        $invoice->kes_id = $request->input('kes_id');
        $invoice->user_id = $request->input('user_id');
        $invoice->save();
        return redirect('/invoices')->with('success', 'Invoice generated');
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
        $invoice = Invoice::find($id);
        return view('invoices.show')->with('invoice', $invoice);
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
