<?php

namespace App\Http\Controllers;

use App\Models\Pkwt;
use App\Imports\ImportPkwts;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePkwtRequest;
use App\Http\Requests\UpdatePkwtRequest;

class PkwtController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pkwt-list|pkwt-create|pkwt-edit|pkwt-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pkwt-create', ['only' => ['create','store']]);
         $this->middleware('permission:pkwt-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pkwt-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pkwts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePkwtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pkwt = new Pkwt;
        $pkwt->addendum_id = $request->addendum_id;
        $pkwt->user_id = $request->user_id;
        $pkwt->save();
        // Pkwt::create($request->all());
        return redirect()->route('pkwts.index')
                        ->with('success','Pkwt created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function show(Pkwt $pkwt)
    {
        return view('pkwts.show', compact('pkwt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkwt $pkwt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePkwtRequest  $request
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePkwtRequest $request, Pkwt $pkwt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkwt $pkwt)
    {
        //
    }

    public function import(Request $request)
    {
        Excel::import(new ImportPkwts, $request->file('file')->store('files'));
        return redirect()->back();
    }
}
