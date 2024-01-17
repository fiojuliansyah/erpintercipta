<?php

namespace App\Http\Controllers;

use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        
        $quantity = new Quantity;
        $quantity->user_id = $user->id;
        $quantity->product_id = $request->product_id;
        $quantity->in = $request->in;
        $quantity->opname = $request->opname;
        $quantity->description = $request->description;
        $quantity->save();

        return redirect()->route('products.index')
                        ->with('success','Quantity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function show(Quantity $quantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function edit(Quantity $quantity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quantity $quantity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quantity $quantity)
    {
        //
    }
}
