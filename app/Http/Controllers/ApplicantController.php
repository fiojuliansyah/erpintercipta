<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Candidate;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApplicantController extends Controller
{
    public function index()
    {
        $pelamar = User::whereDoesntHave('career')->count();
        return view('desktop.applicants.index', compact('pelamar'));
    }

    public function show(User $applicant)
    {
        $careers = Career::all();
        return view('desktop.applicants.show', compact('applicant','careers'));
    }

    public function store(Request $request)
    {
        $candidate = new Candidate;
        $candidate->status = '0';
        $candidate->user_id = $request->user_id;
        $candidate->career_id = $request->career_id;

        $qrLink = route('candidates.show', ['candidate' => $candidate->user_id]);
        $qrCode = QrCode::size(200)->generate($qrLink);

        $candidate->qr_link = $qrCode;
        $candidate->save();

        return redirect()->route('applicants.index')
                        ->with('success','Berhasil Melamar Pekerjaan');
    }
}
