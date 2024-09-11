<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Career;
use App\Models\Statory;
use App\Models\Candidate;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Notifications\CandidateUpdate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApplicantController extends Controller
{
    public function index()
    {
        $agent = new Agent;
        $pelamar = User::whereDoesntHave('career')->count();

        if ($agent->isMobile()) {
            return view('mobiles.applicants.index', compact('pelamar'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.applicants.index', compact('pelamar'));
        } else {
            return view('desktop.applicants.index', compact('pelamar'));
        }
    }

    public function show(User $applicant)
    {
        $agent = new Agent;
        $careers = Career::all();
        $documents = $applicant->documents;

        if ($agent->isMobile()) {
            return view('mobiles.applicants.show', compact('applicant','careers','documents'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.applicants.show', compact('applicant','careers','documents'));
        } else {
            return view('desktop.applicants.show', compact('applicant','careers','documents'));
        }

    }

    public function store(Request $request)
    {
        $candidate = new Candidate;
        $candidate->status = $request->status;
        $candidate->user_id = $request->user_id;
        $candidate->career_id = $request->career_id;
    
        $qrLink = route('candidates.show', ['candidate' => $candidate->user_id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
    
        $candidate->qr_link = $qrCode;
        $candidate->save();

        $statory = new Statory;
        $statory->status = $request->status;
        $statory->candidate_id = $candidate->id;
        $statory->save();

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
        
        return redirect()->route('applicants.index')
                        ->with('success', 'Berhasil Melamar Pekerjaan');
    }  
}
