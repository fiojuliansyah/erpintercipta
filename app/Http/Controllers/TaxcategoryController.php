<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxcategoryRequest;
use App\Http\Requests\UpdateTaxcategoryRequest;
use App\Models\Taxcategory;

class TaxcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:taxcategory-list|taxcategory-create|taxcategory-edit|taxcategory-delete', ['only' => ['index','show']]);
         $this->middleware('permission:taxcategory-create', ['only' => ['create','store']]);
         $this->middleware('permission:taxcategory-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:taxcategory-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dekstop.taxcategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dekstop.taxcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaxcategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'taxcategory' => 'required',
        ]);
        
        $taxcategory = new Taxcategory;
        $taxcategory->taxcategory = $request->taxcategory;
        $taxcategory->save();
        // Crud::create($request->all());
        return redirect()->route('dekstop.taxcategories.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxcategory  $taxcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Taxcategory $taxcategory)
    {
        return view('dekstop.taxcategories.show',compact('taxcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxcategory  $taxcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxcategory $taxcategory)
    {
        return view('dekstop.taxcategories.edit',compact('taxcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaxcategoryRequest  $request
     * @param  \App\Models\Taxcategory  $taxcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'taxcategory' => 'required',
        ]);
        
        $taxcategory = Taxcategory::find($id);
        $taxcategory->taxcategory = $request->taxcategory;
        
        $taxcategory->save();
        // $crud->update($request->all());
        return redirect()->route('dekstop.taxcategories.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxcategory  $taxcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxcategory $taxcategory)
    {
        $taxcategory->delete();

        return redirect()->route('dekstop.taxcategories.index')
                        ->with('success','Product deleted successfully');
    }
}
