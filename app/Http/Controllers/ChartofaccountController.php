<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Accounttype;
use Illuminate\Http\Request;
use App\Models\Chartofaccount;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChartofaccountRequest;
use App\Http\Requests\UpdateChartofaccountRequest;

class ChartofaccountController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:chartofaccount-list|chartofaccount-create|chartofaccount-edit|chartofaccount-delete', ['only' => ['index','show']]);
         $this->middleware('permission:chartofaccount-create', ['only' => ['create','store']]);
         $this->middleware('permission:chartofaccount-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:chartofaccount-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desktop.chartofaccounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $accounttypes = Accounttype::all();
        return view('desktop.chartofaccounts.create', compact('customers','accounttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChartofaccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'accounttype_id' => 'required',
            'accountname' => 'required',
        ]);
        $user = Auth::user()->name;
        
        $chartofaccount = new Chartofaccount;
        $chartofaccount->status = $request->status;
        $chartofaccount->accounttype_id = $request->accounttype_id;
        $chartofaccount->accountname = $request->accountname;
        $chartofaccount->user_id = $user;
        $chartofaccount->save();
        // Crud::create($request->all());
        return redirect()->route('chartofaccounts.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chartofaccount  $chartofaccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chartofaccount = Chartofaccount::find($id);
        return view('desktop.chartofaccounts.show',compact('chartofaccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chartofaccount  $chartofaccount
     * @return \Illuminate\Http\Response
     */
    public function edit(Chartofaccount $chartofaccount)
    {
        $accounttypes = Accounttype::all();
        return view('desktop.chartofaccounts.edit',compact('chartofaccount', 'accounttypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChartofaccountRequest  $request
     * @param  \App\Models\Chartofaccount  $chartofaccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chartofaccount = Chartofaccount::find($id);

        $chartofaccount->status = $request->status;
        $chartofaccount->accounttype_id = $request->accounttype_id;
        $chartofaccount->accountname = $request->accountname;
        
        $chartofaccount->save();
        // $crud->update($request->all());
        return redirect()->route('chartofaccounts.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chartofaccount  $chartofaccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chartofaccount $chartofaccount)
    {
        //
    }
}
