<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kes;
use \App\Customer;
use \App\Category;
use \App\Evidence;
use Auth;

class evidencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getKesEvidence($kes_id)
    {
        //
        $evidences = Evidence::all()->where('kes_id', $kes_id);
        return view('evidences.index')->with('evidences', $evidences);
    }
    public function index()
    {
        //
            $lawyer_id = Auth::user()->id;
        $evidences = Evidence::all()->where('user_id', $lawyer_id);
        return view('evidences.index')->with('evidences', $evidences);
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
            $categories = Category::all();
            $evidencekes = Kes::all()->where('user_id', $lawyer_id);

            $data = [
                'keskes' => $evidencekes,
                'categories' => $categories,
            ];
            return view('evidences.create')->with($data);
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
            'desc' => 'required',
            'file' => 'mimes:zip,rar|max:10000|nullable',
            'kes_id' => 'required',
            'user_id' => 'required',
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
            $path = $request->file('file')->storeAs('public/evidences', $fileNameToStore);

        }else {
            $fileNameToStore = 'N/A';
        }
        // Create an Evidence
        $evidence = new Evidence;
        $evidence->name = $request->input('name');
        $evidence->desc = $request->input('desc');
        $evidence->user_id = $request->input('user_id');
        $evidence->file = $fileNameToStore;
        $evidence->kes_id = $request->input('kes_id');
        $evidence->save();
        return redirect('/evidences')->with('success', 'Evidence added');
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
        $lawyer_id = Auth::user()->id;
        $evidence = Evidence::find($id);
        return view('evidences.show')->with('evidence', $evidence);
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
            $lawyer_id = Auth::user()->id;
            $categories = Category::all();
            $evidencekes = Kes::all()->where('user_id', $lawyer_id);
            $evidence = Evidence::find($id);

            $data = [
                'keskes' => $evidencekes,
                'categories' => $categories,
                'evidence' => $evidence,
            ];
            return view('evidences.edit')->with($data);
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
        //        //
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'file' => 'mimes:zip,rar|max:10000|nullable',
            'kes_id' => 'required',
            'user_id' => 'required',
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
            $path = $request->file('file')->storeAs('public/evidences', $fileNameToStore);

        }else {
            $fileNameToStore = 'N/A';
        }
        // Update an Evidence
        $evidence = Evidence::find($id);
        $evidence->name = $request->input('name');
        $evidence->desc = $request->input('desc');
        $evidence->user_id = $request->input('user_id');
        $evidence->file = $fileNameToStore;
        $evidence->kes_id = $request->input('kes_id');
        $evidence->save();
        return redirect('/evidences')->with('success', 'Evidence edited');
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
