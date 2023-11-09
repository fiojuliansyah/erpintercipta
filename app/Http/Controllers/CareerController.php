<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;

class CareerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:career-list|career-create|career-edit|career-delete', ['only' => ['index','show']]);
         $this->middleware('permission:career-create', ['only' => ['create','store']]);
         $this->middleware('permission:career-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:career-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desktop.careers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('desktop.careers.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCareerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jobname' => 'required',
            'description' => 'required',
            'department' => 'required',
        ]);
        $user = Auth::user()->name;

        $career = new Career;
        $career->status = $request->status;
        $career->company_id = $request->company_id;
        $career->jobname = $request->jobname;
        $career->description = $request->description;
        $career->department = $request->department;
        $career->location = $request->location;
        $career->latitude = $request->latitude;
        $career->longitude = $request->longitude;
        $career->workfunction = $request->workfunction;
        $career->experience = $request->experience;
        $career->major = $request->major;
        $career->graduate = $request->graduate;
        $career->salary = $request->salary;
        $career->candidate = $request->candidate;
        $career->user_id = $user;
        $career->save();

        return redirect()->route('careers.index')
                        ->with('success','Career created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::find($id);
        return view('jobportal.show',compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        $companies = Company::all();
        return view('desktop.careers.edit',compact('companies','career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCareerRequest  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jobname' => 'required',
            'description' => 'required',
            'department' => 'required',
        ]);
        $user = Auth::user()->name;

        $career = Career::find($id);
        $career->status = $request->status;
        $career->company_id = $request->company_id;
        $career->jobname = $request->jobname;
        $career->description = $request->description;
        $career->department = $request->department;
        $career->location = $request->location;
        $career->latitude = $request->latitude;
        $career->longitude = $request->longitude;
        $career->workfunction = $request->workfunction;
        $career->experience = $request->experience;
        $career->major = $request->major;
        $career->graduate = $request->graduate;
        $career->salary = $request->salary;
        $career->candidate = $request->candidate;
        $career->user_id = $user;
        $career->save();

        return redirect()->route('careers.index')
                        ->with('success','Career updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('careers.index')
                        ->with('success','Product deleted successfully');
    }
}
