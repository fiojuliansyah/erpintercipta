<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Company;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Accounttype;
use App\Models\Taxcategory;
use Illuminate\Http\Request;
use App\Models\Chartofaccount;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('projects.index',compact('user'));
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
        $accounttypes = Accounttype::all();
        $terms = Term::all();
        
        return view('projects.create', compact('companies','taxcategories','accounttypes','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
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
        
        $department = new Department;
        $department->status = $customer->status;
        $department->customer_id = $customer->id;
        $department->departmentname = $request->departmentname;
        $department->user_id = $user;
        $department->save();

        $chartofaccount = new Chartofaccount;
        $chartofaccount->status = $customer->status;
        $chartofaccount->customer_id = $customer->id;
        $chartofaccount->accounttype_id = $request->accounttype_id;
        $chartofaccount->accountname = $request->accountname;
        $chartofaccount->user_id = $user;
        $chartofaccount->save();
        
        // Crud::create($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        \Storage::delete($project->tax_image);

        return redirect()->route('projects.index')
                        ->with('success','Product deleted successfully');
    }
}
