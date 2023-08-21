<?php

namespace App\Http\Controllers;

use App\Models\Pkwt;
use Illuminate\Http\Request;
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
        $request->validate([
            'date' => 'required',
            'date_abjad' => 'required',
            'month' => 'required',
            'month_abjad' => 'required',
            'year' => 'required',
            'year_abjad' => 'required',
            'project' => 'required',
            'area' => 'required',
            'salary' => 'required',
            'allowance' => 'required',
            'place' => 'required',
        ]);
        
        $pkwt = new Pkwt;
        $pkwt->reference_number = $request->reference_number;
        $pkwt->user_id = $request->user_id;
        $pkwt->company_id = $request->company_id;
        $pkwt->date = $request->date;
        $pkwt->date_abjad = $request->date_abjad;
        $pkwt->month = $request->month;
        $pkwt->month_abjad = $request->month_abjad;
        $pkwt->year = $request->year;
        $pkwt->year_abjad = $request->year_abjad;
        $pkwt->project = $request->project;
        $pkwt->area = $request->area;
        $pkwt->salary = $request->salary;
        $pkwt->allowance = $request->allowance;
        $pkwt->place = $request->place;
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
}
