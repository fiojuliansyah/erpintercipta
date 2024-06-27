<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pkwt;
use App\Models\User;
use App\Models\Esign;
use App\Models\Candidate;
use App\Models\Signature;
use App\Imports\ImportPkwts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePkwtRequest;
use App\Http\Requests\UpdatePkwtRequest;

class PkwtController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pkwt-list|pkwt-create|pkwt-edit|pkwt-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pkwt-create', ['only' => ['create','store']]);
         $this->middleware('permission:pkwt-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pkwt-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desktop.pkwts.index');
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
     * @param  \App\Http\Requests\StorePkwtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pkwt = new Pkwt;
        $pkwt->addendum_id = $request->addendum_id;
        $pkwt->pkwt_number = $request->pkwt_number;
        $pkwt->user_id = $request->user_id;
        $pkwt->save();
        // Pkwt::create($request->all());
        return redirect()->route('pkwts.index')
                        ->with('success','Pkwt created successfully.');
    }

    public function storeFromCandidate(Request $request)
    {
        // Menyimpan data PKWT
        $pkwt = new Pkwt;
        $pkwt->agreement_id = $request->agreement_id;
        $pkwt->pkwt_number = $request->pkwt_number;
        $pkwt->user_id = $request->user_id;
        $pkwt->save();
    
        // Jika penyimpanan PKWT berhasil, perbarui status candidate menjadi 7
        if ($pkwt) {
            $candidate = Candidate::where('user_id', $request->user_id)->first();
            if ($candidate) {
                $candidate->status = 7;
                $candidate->save();
    
                // Temukan profil pengguna terkait
                $user = User::find($request->user_id);
                if ($user) {
                    // Asumsikan bahwa relasi antara User dan Profile adalah one-to-one
                    $profile = $user->profile;
                    if ($profile) {
                        // Perbarui nilai department di sini sesuai kebutuhan Anda
                        $profile->department = 'karyawan';
                        $profile->save();
                    }
                }
            }
        }
    
        return redirect()->route('pkwts.index')
                        ->with('success', 'PKWT created successfully.');
    }        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function show(Pkwt $pkwt)
    {
        return view('desktop.pkwts.show', compact('pkwt'));
    }

    public function export(Pkwt $pkwt)
    {
        return view('desktop.pkwts.export', compact('pkwt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkwt $pkwt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePkwtRequest  $request
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hrApprove = Auth::user()->name;
        $userId = Auth::user()->id;
        $signature = Esign::where('user_id', $userId)->first();

        if ($signature) {
            $hrSignature = $signature->signatureDataUrl;
        } else {
            $hrSignature = null;
        }

        $pkwt = Pkwt::find($id);
        $pkwt->user_hrd = $hrApprove;
        $pkwt->signature_hrd = $hrSignature;
        $pkwt->save();

        return redirect()->route('pkwts.index')
                        ->with('success', 'Pkwt updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkwt  $pkwt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkwt $pkwt)
    {
        $pkwt->delete();

        return redirect()->route('pkwts.index')
                        ->with('success','Product deleted successfully');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportPkwts, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function approveByProject(Request $request)
    {
        $projectId = $request->input('project_id');
        if (empty($projectId)) {
            return redirect()->back()->with('error', 'Please select a project');
        }

        $hrApprove = Auth::user()->name;
        $userId = Auth::user()->id;
        $signature = Esign::where('user_id', $userId)->first();

        if ($signature) {
            $hrSignature = $signature->signatureDataUrl;
        } else {
            $hrSignature = null;
        }

        $pkws = Pkwt::whereHas('agreement.addendum', function ($query) use ($projectId) {
            $query->where('site_id', $projectId);
        })->get();

        foreach ($pkws as $pkwt) {
            $pkwt->user_hrd = $hrApprove;
            $pkwt->signature_hrd = $hrSignature;
            $pkwt->save();
        }

        return redirect()->route('pkwts.index')
                        ->with('success', 'All selected PKWTs updated successfully');
    }

}
