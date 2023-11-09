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
        return view('dekstop.applicants.index', compact('pelamar'));
    }

    public function show(User $applicant)
    {
        $careers = Career::all();
        return view('dekstop.applicants.show', compact('applicant','careers'));
    }

    public function store(Request $request)
    {
        $candidate = new Candidate;
        $candidate->status = $request->status;
        $candidate->user_id = $request->user_id;
        $candidate->career_id = $request->career_id;
        $candidate->save();

        // Buat tautan untuk tampilan data pelamar dengan ID yang baru saja dibuat
        $qrLink = route('candidates.show', ['candidate' => $candidate->id]);

        // Lanjutkan dengan menghasilkan QR code seperti sebelumnya
        $qrCode = QrCode::size(200)->generate($qrLink);

        $candidate->qr_link = $qrCode;
        $candidate->save();

        return redirect()->route('dekstop.applicants.index')
                        ->with('success','Berhasil Melamar Pekerjaan');
    }
}
