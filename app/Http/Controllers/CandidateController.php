<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Site;
use App\Models\Career;
use App\Models\Statory;
use App\Models\Addendum;
use App\Models\Agreement;
use App\Models\Candidate;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CandidateUpdate;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;

class CandidateController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:candidate-list|candidate-create|candidate-edit|candidate-delete', ['only' => ['index','show']]);
         $this->middleware('permission:candidate-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:candidate-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $agent = new Agent;
        
        if ($agent->isMobile()) {
            return view('mobiles.candidates.index');
        } elseif ($agent->isDesktop()) {
            return view('desktop.candidates.index');
        } else {
            return view('desktop.candidates.index');
        }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $existingCandidate = Candidate::where('user_id', auth()->id())->first();
    
        if ($existingCandidate) {
            return redirect()->route('history')->with('error', 'Anda sudah melamar pekerjaan sebelumnya.');
        }
    
        $candidate = new Candidate;
        $candidate->status = '0';
        $candidate->user_id = auth()->id();
        $candidate->career_id = $request->career_id;
        $candidate->save();
    
        $statory = new Statory;
        $statory->status = '0';
        $statory->candidate_id = $candidate->id;
        $statory->save();
    
        $qrLink = route('candidates.show', ['candidate' => $candidate->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
        $candidate->qr_link = $qrCode;
        $candidate->save();

    
        return redirect()->route('history')->with('success', 'Berhasil Melamar Pekerjaan');
    }    

    public function QRUpdate(Request $request, $id)
    {   
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return redirect()->route('candidates.index')
                            ->with('error', 'Candidate not found');
        }

        $qrLink = route('candidates.show', ['candidate' => $candidate->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
        $candidate->qr_link = $qrCode;
        $candidate->save();

        return redirect()->route('candidates.index')
                        ->with('success', 'Candidate updated successfully');
    }



    public function show(Candidate $candidate)
    {
        $agent = new Agent;
        $sites = Site::all();
        $careers = Career::all();
        $addendums = Addendum::all();
        $agreements = Agreement::all();
        $documents = $candidate->user->documents;
        
        if ($agent->isMobile()) {
            return view('mobiles.candidates.show', compact('candidate','addendums', 'sites', 'careers', 'agreements', 'documents'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.candidates.show', compact('candidate','addendums', 'sites', 'careers', 'agreements', 'documents'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan yang sesuai
            return view('desktop.candidates.show', compact('candidate','addendums', 'sites', 'careers', 'agreements', 'documents'));
        }
    
    }

    public function edit(Candidate $candidate)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        $candidate->status = $request->status;
        $candidate->user_id = $request->user_id;
        $candidate->career_id = $request->career_id;
        $candidate->description_user = $request->description_user;
        $candidate->description_client = $request->description_client;
        $candidate->site_id = $request->site_id;
        $candidate->date = $request->date;
        $candidate->responsible = $request->responsible;
        
        $candidate->update();
        if ($candidate->wasChanged()) {
            $statory = new Statory;
            $statory->status = $request->status;
            $statory->candidate_id = $candidate->id;
            $statory->save();
        }

        $notifiable = $candidate->user;
        $phone = $candidate->user->phone;

        if ($notifiable && $phone) {
            $notifiable->notify(new CandidateUpdate(
                $candidate->status,
                $candidate->description_user,
                $candidate->responsible,
                $candidate->date,
                $phone 
                ));
        }
        
        return redirect()->route('candidates.index')
                        ->with('success','Candidate updated successfully');
    }

    public function destroy(Candidate $candidate)
    {
        $candidateId = $candidate->id;
        Statory::where('candidate_id', $candidateId)->delete();
    
        // Hapus Candidate
        $candidate->delete();
    
        return redirect()->route('candidates.index')
                        ->with('success', 'Candidate and associated Statory deleted successfully');
    }
}
