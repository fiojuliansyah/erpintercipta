<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreSignatureRequest;
use App\Http\Requests\UpdateSignatureRequest;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signatures.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSignatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUrl = $request->input('signatureDataUrl');
        $user = Auth::user();
    
        if ($user) {
            // Cek apakah pengguna sudah memiliki tanda tangan
            $existingSignature = Signature::where('user_id', $user->id)->first();
    
            if ($existingSignature) {
                return Redirect::to('/dashboard');
            }
    
            $data = substr($dataUrl, strpos($dataUrl, ',') + 1);
            $decodedData = base64_decode($data);
            $fileName = 'signature_' . uniqid() . '.png';
            $filePath = 'public/signatures/' . $fileName;
            Storage::put($filePath, $decodedData);
            Signature::create([
                'user_id' => $user->id,
                'signatureDataUrl' => 'signatures/' . $fileName,
            ]);
    
            return Redirect::to('/dashboard');
        } else {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function edit(Signature $signature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignatureRequest  $request
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignatureRequest $request, Signature $signature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
        $signature->delete();
        \Storage::delete($signature->signatureDataUrl);

        return redirect()->route('signatures.index')
                        ->with('success','Deleted successfully');
    }
}
