<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\Taxcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;

class VendorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:vendor-list|vendor-create|vendor-edit|vendor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:vendor-create', ['only' => ['create','store']]);
         $this->middleware('permission:vendor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:vendor-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dekstop.vendors.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $taxcategories = Taxcategory::all();
        $terms = Term::all();
        return view('dekstop.vendors.create', compact('companies','taxcategories','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'tax_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $path = $request->file('tax_image')->store('public/tax_images');
        $user = Auth::user()->name;
        
        $vendor = new Vendor;
        $vendor->status = $request->status;
        $vendor->company_id = $request->company_id;
        $vendor->vendorname = $request->vendorname;
        $vendor->address = $request->address;
        $vendor->contact = $request->contact;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->term_id = $request->term_id;
        $vendor->taxcategorya_id = $request->taxcategorya_id;
        $vendor->taxcategoryb_id = $request->taxcategoryb_id;
        $vendor->taxnumber = $request->taxnumber;
        $vendor->taxaddress = $request->taxaddress;
        $vendor->tax_image = $path;
        $vendor->user_id = $user;
        $vendor->save();

        return redirect()->route('dekstop.vendors.index')
                         ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('dekstop.vendors.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $companies = Company::all();
        $taxcategories = Taxcategory::all();
        $terms = Term::all();
        return view('dekstop.vendors.edit',compact('vendor','companies','taxcategories','terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorRequest  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'tax_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('tax_image')->store('public/tax_images');
            $vendor->tax_image = $path;
        }

        $vendor->status = $request->status;
        $vendor->company_id = $request->company_id;
        $vendor->vendorname = $request->vendorname;
        $vendor->address = $request->address;
        $vendor->contact = $request->contact;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->term_id = $request->term_id;
        $vendor->taxcategorya_id = $request->taxcategorya_id;
        $vendor->taxcategoryb_id = $request->taxcategoryb_id;
        $vendor->taxnumber = $request->taxnumber;
        $vendor->taxaddress = $request->taxaddress;
        
        $vendor->save();
        // $crud->update($request->all());
        return redirect()->route('dekstop.vendors.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        \Storage::delete($vendor->tax_image);

        return redirect()->route('dekstop.vendors.index')
                        ->with('success','Product deleted successfully');
    }
}
