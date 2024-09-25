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
        // Create a new Candidate instance and assign values from the request
        $candidate = new Candidate;
        $candidate->status = $request->status;
        $candidate->user_id = $request->user_id;
        $candidate->career_id = $request->career_id;
        
        // Save the candidate to get the ID
        $candidate->save();
    
        // Generate QR code based on the saved candidate ID and store it
        $qrLink = route('candidates.show', ['candidate' => $candidate->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
    
        // Update the candidate with the generated QR code link
        $candidate->qr_link = $qrLink; // If you store the URL for later usage
        $candidate->save(); // Save again with the QR code link
    
        // Create a new Statory instance and associate it with the candidate
        $statory = new Statory;
        $statory->status = $request->status;
        $statory->candidate_id = $candidate->id;
        $statory->save();
    
        // Notify the user (if phone number is available)
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
    
        // Redirect with success message
        return redirect()->route('applicants.index')
                        ->with('success', 'Berhasil Melamar Pekerjaan');
    }
     
}
