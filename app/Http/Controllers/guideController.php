<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Guide;
use \App\Category;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::all();
        return view('guides.index')->with('guides', $guides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $data = [
            'categories' => $categories,
        ];

        return view('guides.create')->with($data);
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
            'name' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
            'file' => 'max:10000|nullable',
        ]);
        //Handle File Upload
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('file')->storeAs('public/guides', $fileNameToStore);

        }else {
            $fileNameToStore = 'N/A';
        }
        // Create a guide
        $guide = new Guide;
        $guide->name = $request->input('name');
        $guide->desc = $request->input('desc');
        $guide->category_id = $request->input('category_id');
        $guide->file = $fileNameToStore;
        $guide->save();
        return redirect('/guide')->with('success', 'Guide added');
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
        $guide = Guide::find($id);
        return view('guides.show')->with('guide', $guide);
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
