<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccounttypeRequest;
use App\Http\Requests\UpdateAccounttypeRequest;
use App\Models\Accounttype;

class AccounttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:accounttype-list|accounttype-create|accounttype-edit|accounttype-delete', ['only' => ['index','show']]);
         $this->middleware('permission:accounttype-create', ['only' => ['create','store']]);
         $this->middleware('permission:accounttype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:accounttype-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desktop.accounttypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desktop.accounttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccounttypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'accounttype' => 'required',
        ]);
        
        $accounttype = new Company;
        $accounttype->accounttype = $request->accounttype;
        $accounttype->save();
        // Crud::create($request->all());
        return redirect()->route('accounttypes.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function show(Accounttype $accounttype)
    {
        return view('desktop.accounttypes.show',compact('accounttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounttype $accounttype)
    {
        return view('desktop.accounttypes.edit',compact('accounttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccounttypeRequest  $request
     * @param  \App\Models\Accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'accounttype' => 'required',
        ]);
        
        $accounttype = Accounttype::find($id);
        $accounttype->accounttype = $request->accounttype;
        
        $accounttype->save();
        // $crud->update($request->all());
        return redirect()->route('accounttypes.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounttype $accounttype)
    {
        $accounttype->delete();

        return redirect()->route('accounttype.index')
                        ->with('success','Product deleted successfully');
    }
}
