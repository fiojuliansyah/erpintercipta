<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;

class ApplicantController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:applicant-list|applicant-create|applicant-edit|applicant-delete', ['only' => ['index','show']]);
         $this->middleware('permission:applicant-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:applicant-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicants.index');
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
     * @param  \App\Http\Requests\StoreApplicantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'user_id' => 'required',
            'career_id' => 'required',
        ]);
        
        $applicant = new Applicant;
        $applicant->status = $request->status;
        $applicant->user_id = $request->user_id;
        $applicant->career_id = $request->career_id;
        $applicant->save();
        // Crud::create($request->all());
        return redirect()->route('jobportal')
                        ->with('success','Berhasil Melamar Pekerjaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('applicants.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicantRequest  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'user_id' => 'required',
            'career_id' => 'required',
        ]);
        
        $applicant = Applicant::find($id);
        $applicant->status = $request->status;
        $applicant->user_id = $request->user_id;
        $applicant->career_id = $request->career_id;
        
        $applicant->save();
        // $crud->update($request->all());
        return redirect()->route('applicants.index')
                        ->with('success','Applicant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
