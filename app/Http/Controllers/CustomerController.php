<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Taxcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dekstop.customers.index');
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
        return view('dekstop.customers.create', compact('companies','taxcategories','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
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
        
        $customer = new Customer;
        $customer->status = $request->status;
        $customer->company_id = $request->company_id;
        $customer->customername = $request->customername;
        $customer->address = $request->address;
        $customer->contact = $request->contact;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->term_id = $request->term_id;
        $customer->taxcategorya_id = $request->taxcategorya_id;
        $customer->taxcategoryb_id = $request->taxcategoryb_id;
        $customer->taxnumber = $request->taxnumber;
        $customer->taxaddress = $request->taxaddress;
        $customer->tax_image = $path;
        $customer->user_id = $user;
        $customer->save();

        return redirect()->route('dekstop.customers.index')
                         ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('dekstop.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        $taxcategories = Taxcategory::all();
        $terms = Term::all();
        return view('dekstop.customers.edit',compact('customer','companies','taxcategories','terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'tax_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('tax_image')->store('public/tax_images');
            $customer->tax_image = $path;
        }

        $customer->status = $request->status;
        $customer->company_id = $request->company_id;
        $customer->customername = $request->customername;
        $customer->address = $request->address;
        $customer->contact = $request->contact;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->term_id = $request->term_id;
        $customer->taxcategorya_id = $request->taxcategorya_id;
        $customer->taxcategoryb_id = $request->taxcategoryb_id;
        $customer->taxnumber = $request->taxnumber;
        $customer->taxaddress = $request->taxaddress;
        
        $customer->save();
        // $crud->update($request->all());
        return redirect()->route('dekstop.customers.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        \Storage::delete($customer->tax_image);

        return redirect()->route('dekstop.customers.index')
                        ->with('success','Product deleted successfully');
    }
}
