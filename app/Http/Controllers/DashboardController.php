<?php

namespace App\Http\Controllers;

use App\Models\Pkwt;
use App\Models\User;
use App\Models\Career;
use App\Models\Company;
use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard' ,compact('user'));
    }

    public function karir()
    {
        $user = Auth::user();
        $careers = Career::all();
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();
        return view('job-portal' ,compact('careers','user','allcareer','alluser','companies'));
    }

    public function karirDetail($id)
    {
        $career = Career::find($id);
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();
        return view('job-detail',compact('career','allcareer','alluser','companies'));
    }

    public function jobPortal()
    {
        $user = Auth::user();
        $careers = Career::all();
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();
        return view('jobportal.index' ,compact('careers','user','allcareer','alluser','companies'));
    }

    public function jobDetail($id)
    {
        $career = Career::find($id);
        return view('jobportal.show',compact('career'));
    }

    public function pkwt(Pkwt $pkwt)
    {
        return view('tanda-tangan', compact('pkwt'));
    }


    public function MyResume(Applicant $applicant)
    {
        return view('my-resume',compact('applicant'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
