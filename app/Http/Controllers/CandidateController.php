<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Applicant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CandidateController extends Controller
{
    public function index()
    {
        return view('candidates.index');
    }

    public function show(User $candidate)
    {
        $careers = Career::all();
        return view('candidates.show', compact('candidate','careers'));
    }

    public function store(Request $request)
    {
        $applicant = new Applicant;
        $applicant->status = $request->status;
        $applicant->user_id = $request->user_id;
        $applicant->career_id = $request->career_id;
        $applicant->save();

        // Buat tautan untuk tampilan data pelamar dengan ID yang baru saja dibuat
        $qrLink = route('applicants.show', ['applicant' => $applicant->id]);

        // Lanjutkan dengan menghasilkan QR code seperti sebelumnya
        $qrCode = QrCode::size(200)->generate($qrLink);

        $applicant->qr_link = $qrCode;
        $applicant->save();

        return redirect()->route('candidates.index')
                        ->with('success','Berhasil Melamar Pekerjaan');
    }
}
