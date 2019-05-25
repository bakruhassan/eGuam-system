<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kes;
use \App\Customer;
use \App\Evidence;
use \App\Category;
use Auth;

class kesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role == 'admin'){
            $keskes = Kes::all();
            return view('kes.kes')->with('keskes', $keskes);
        }
        elseif(Auth::user()->role == 'lawyer'){
            $lawyer_id = Auth::user()->id;
            $keskes = Kes::all()->where('user_id', $lawyer_id);
            return view('kes.kes')->with('keskes', $keskes);
        }
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'admin'){
            $keskes = Kes::all();
            $customers = Customer::all();
            $evidences = Evidence::all();
            $categories = Category::all();

            $data = [
                'keskes' => $keskes,
                'customers' => $customers,
                'evidences' => $evidences,
                'categories' => $categories,
            ];
            return view('kes.create')->with($data);
        }
        elseif(Auth::user()->role == 'lawyer'){
            $lawyer_id = Auth::user()->id;
            $customers = Customer::all()->where('user_id', $lawyer_id);
            $evidences = Evidence::all()->where('user_id', $lawyer_id);
            $categories = Category::all();
            $keskes = Kes::all()->where('user_id', $lawyer_id);

            $data = [
                'keskes' => $keskes,
                'customers' => $customers,
                'evidences' => $evidences,
                'categories' => $categories,
            ];
            return view('kes.create')->with($data);
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
        //

        $this->validate($request, [
            'name' => 'required',
            'expenses' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'customer_id' => 'required',
        ]);
        // Create a Case
        $kes = new Kes;
        $kes->name = $request->input('name');
        $kes->expenses = $request->input('expenses');
        $kes->status = $request->input('status');
        $kes->category_id = $request->input('category_id');
        $kes->customer_id = $request->input('customer_id');
        $kes->user_id = $request->input('user_id');
        $kes->save();
        return redirect('/kes')->with('success', 'Case added');
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
