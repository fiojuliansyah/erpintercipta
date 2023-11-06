<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Esign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEsignRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateEsignRequest;

class EsignController extends Controller
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
     * @param  \App\Http\Requests\StoreEsignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUrl = $request->input('signatureDataUrl');
        $user = Auth::user();
    
        if ($user) {
            // Cek apakah pengguna sudah memiliki tanda tangan
            $existingEsign = Esign::where('user_id', $user->id)->first();
    
            if ($existingEsign) {
                return Redirect::to('/pkwts');
            }
    
            $data = substr($dataUrl, strpos($dataUrl, ',') + 1);
            $decodedData = base64_decode($data);
            $fileName = 'esign_' . uniqid() . '.png';
            $filePath = 'public/esigns/' . $fileName;
            Storage::put($filePath, $decodedData);
            Esign::create([
                'user_id' => $user->id,
                'signatureDataUrl' => 'esigns/' . $fileName,
            ]);
    
            return redirect()->route('pkwts.index');
        } else {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Esign  $esign
     * @return \Illuminate\Http\Response
     */
    public function show(Esign $esign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Esign  $esign
     * @return \Illuminate\Http\Response
     */
    public function edit(Esign $esign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEsignRequest  $request
     * @param  \App\Models\Esign  $esign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEsignRequest $request, Esign $esign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Esign  $esign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Esign $esign)
    {
        //
    }
}
