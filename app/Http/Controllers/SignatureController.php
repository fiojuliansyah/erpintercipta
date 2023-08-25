<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param  \App\Http\Requests\StoreSignatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUrl = $request->input('signatureDataUrl');
        $user = Auth::user(); // Get the authenticated user

        if ($user) {
            // Decode Data URL
            $data = substr($dataUrl, strpos($dataUrl, ',') + 1);
            $decodedData = base64_decode($data);

            $fileName = 'signature_' . uniqid() . '.png'; // Generate a unique file name
            $filePath = 'public/signatures/' . $fileName; // Path within storage/app

            // Store the signature in the storage
            \Storage::put($filePath, $decodedData);

            // Save the file path and user ID to your database
            // Assuming you have a 'signatures' table with 'user_id' and 'file_path' columns
            Signature::create([
                'user_id' => $user->id,
                'signatureDataUrl' => 'signatures/' . $fileName,
            ]);

            return Redirect::to('/dashboard'); // Redirect to the dashboard page
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
        //
    }
}
