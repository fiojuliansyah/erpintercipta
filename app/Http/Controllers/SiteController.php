<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:site-list|site-create|site-edit|site-delete', ['only' => ['index','show']]);
         $this->middleware('permission:site-create', ['only' => ['create','store']]);
         $this->middleware('permission:site-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:site-delete', ['only' => ['destroy']]);
    }
    
     public function index()
    {
        return view('desktop.sites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('desktop.sites.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $site = new Site;
        $site->company_id = $request->company_id;
        $site->name = $request->name;
        $site->description = $request->description;
        $site->lat = $request->lat;
        $site->long = $request->long;
        $site->save();
        // Crud::create($request->all());
        return redirect()->route('sites.index')
                        ->with('success','site created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        $companies = Company::all();
        return view('desktop.sites.edit', compact('companies','site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteRequest  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $site = Site::find($id);
        $site->name = $request->name;
        $site->description = $request->description;
        $site->lat = $request->lat;
        $site->long = $request->long;
        $site->show_document = $request->show_document;
        $site->save();

        // $crud->update($request->all());
        return redirect()->route('sites.index')
                        ->with('success','Site updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();

        return redirect()->route('sites.index')
                        ->with('success','Site deleted successfully');
    }
}
