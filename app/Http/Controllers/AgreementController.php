<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Company;
use App\Models\Addendum;
use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAgreementRequest;
use App\Http\Requests\UpdateAgreementRequest;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:agreement-list|agreement-create|agreement-edit|agreement-delete', ['only' => ['index','show']]);
         $this->middleware('permission:agreement-create', ['only' => ['create','store']]);
         $this->middleware('permission:agreement-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agreement-delete', ['only' => ['destroy']]);
    }

     public function index()
    {
        return view('agreements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $addendums = Addendum::all();
        return view('agreements.create', compact('companies','addendums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgreementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agreement = new Agreement;
        $agreement->area = $request->area;
        $agreement->salary = $request->salary;
        $agreement->department_allowance = $request->department_allowance;
        $agreement->attendance_allowance = $request->attendance_allowance;
        $agreement->comunication_allowance = $request->comunication_allowance;
        $agreement->beauty_allowance = $request->beauty_allowance;
        $agreement->food_allowance = $request->food_allowance;
        $agreement->transport_allowance = $request->transport_allowance;
        $agreement->location_allowance = $request->location_allowance;
        $agreement->other_non_fix_allowance = $request->other_non_fix_allowance;
        $agreement->department = $request->department;
        $agreement->start_date = $request->start_date;
        $agreement->end_date = $request->end_date;
        $agreement->place = $request->place;
        $agreement->year = $request->year;
        $agreement->romawi = $request->romawi;
        $agreement->title = $request->title;
        $agreement->responsible = $request->responsible;
        $agreement->addendum_id = $request->addendum_id;
        $agreement->save();

        return redirect()->route('agreements.index')
                        ->with('success','Agreement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(Agreement $agreement)
    {
        $companies = Company::all();
        $sites = Site::all();
        $addendums = Addendum::all();
        return view('agreements.edit', compact('companies','sites','agreement','addendums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgreementRequest  $request
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agreement = Agreement::find($id);
        $agreement->area = $request->area;
        $agreement->salary = $request->salary;
        $agreement->department_allowance = $request->department_allowance;
        $agreement->attendance_allowance = $request->attendance_allowance;
        $agreement->comunication_allowance = $request->comunication_allowance;
        $agreement->beauty_allowance = $request->beauty_allowance;
        $agreement->food_allowance = $request->food_allowance;
        $agreement->transport_allowance = $request->transport_allowance;
        $agreement->location_allowance = $request->location_allowance;
        $agreement->other_non_fix_allowance = $request->other_non_fix_allowance;
        $agreement->department = $request->department;
        $agreement->start_date = $request->start_date;
        $agreement->end_date = $request->end_date;
        $agreement->place = $request->place;
        $agreement->year = $request->year;
        $agreement->romawi = $request->romawi;
        $agreement->title = $request->title;
        $agreement->responsible = $request->responsible;
        $agreement->addendum_id = $request->addendum_id;
        $agreement->save();

        return redirect()->route('agreements.index')
                        ->with('success','Agreement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        $agreement->delete();

        return redirect()->route('agreements.index')
                        ->with('success','Agreement deleted successfully');
    }
}
