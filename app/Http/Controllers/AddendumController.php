<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Addendum;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddendumRequest;
use App\Http\Requests\UpdateAddendumRequest;

class AddendumController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:addendum-list|addendum-create|addendum-edit|addendum-delete', ['only' => ['index','show']]);
         $this->middleware('permission:addendum-create', ['only' => ['create','store']]);
         $this->middleware('permission:addendum-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:addendum-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addendums.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('addendums.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAddendumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addendum = new Addendum;
        $addendum->responsible = $request->responsible;
        $addendum->addendum = $request->addendum;
        $addendum->attachment = $request->attachment;
        $addendum->reference_number = $request->reference_number;
        $addendum->company_id = $request->company_id;
        $addendum->date = $request->date;
        $addendum->date_abjad = $request->date_abjad;
        $addendum->month = $request->month;
        $addendum->month_abjad = $request->month_abjad;
        $addendum->year = $request->year;
        $addendum->year_abjad = $request->year_abjad;
        $addendum->project = $request->project;
        $addendum->area = $request->area;
        $addendum->salary = $request->salary;
        $addendum->allowance = $request->allowance;
        $addendum->place = $request->place;
        $addendum->save();

        return redirect()->route('addendums.index')
                        ->with('success','Addendum created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addendum  $addendum
     * @return \Illuminate\Http\Response
     */
    public function show(Addendum $addendum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Addendum  $addendum
     * @return \Illuminate\Http\Response
     */
    public function edit(Addendum $addendum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddendumRequest  $request
     * @param  \App\Models\Addendum  $addendum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddendumRequest $request, Addendum $addendum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addendum  $addendum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addendum $addendum)
    {
        $addendum->delete();

        return redirect()->route('addendums.index')
                        ->with('success','Product deleted successfully');
    }
}
