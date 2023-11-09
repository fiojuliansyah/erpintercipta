<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
        return view('dekstop.addendums.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $sites = Site::all();
        return view('dekstop.addendums.create', compact('companies','sites'));
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
        $addendum->addendum = $request->addendum;
        $addendum->attachment_1 = $request->attachment_1;
        $addendum->attachment_2 = $request->attachment_2;
        $addendum->site_id = $request->site_id;
        $addendum->title = $request->title;
        $addendum->save();

        return redirect()->route('dekstop.addendums.index')
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
        $companies = Company::all();
        $sites = Site::all();
        return view('dekstop.addendums.edit', compact('companies','addendum','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddendumRequest  $request
     * @param  \App\Models\Addendum  $addendum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $addendum = Addendum::find($id);
        $addendum->addendum = $request->addendum;
        $addendum->attachment_1 = $request->attachment_1;
        $addendum->attachment_2 = $request->attachment_2;
        $addendum->site_id = $request->site_id;
        $addendum->title = $request->title;
        $addendum->save();
        // $crud->update($request->all());
        return redirect()->route('dekstop.addendums.index')
                        ->with('success','Addendum updated successfully');
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

        return redirect()->route('dekstop.addendums.index')
                        ->with('success','Product deleted successfully');
    }
}
