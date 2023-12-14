<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Career;
use App\Models\Statory;
use App\Models\Addendum;
use App\Models\Agreement;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('desktop.candidates.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // Mengecek apakah pengguna sudah membuat calon sebelumnya
        $existingCandidate = Candidate::where('user_id', auth()->id())->first();
    
        if ($existingCandidate) {
            // Redirect atau lakukan tindakan lain sesuai kebutuhan Anda
            return redirect()->route('history')->with('error', 'Anda sudah melamar pekerjaan sebelumnya.');
        }
    
        // Jika pengguna belum membuat calon, lanjutkan dengan proses pembuatan
        $candidate = new Candidate;
        $candidate->status = '0';
        $candidate->user_id = auth()->id(); // Menggunakan ID pengguna yang diautentikasi
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
        // Cari data pelamar berdasarkan ID
        $candidate = Candidate::find($id);

        // Pastikan data pelamar ditemukan sebelum melanjutkan
        if (!$candidate) {
            return redirect()->route('candidates.index')
                            ->with('error', 'Candidate not found');
        }

        // Buat tautan untuk tampilan data pelamar dengan ID yang ditemukan
        $qrLink = route('candidates.show', ['candidate' => $candidate->id]);

        // Lanjutkan dengan menghasilkan QR code seperti sebelumnya
        $qrCode = QrCode::size(200)->generate($qrLink);

        // Simpan tautan QR code ke dalam basis data
        $candidate->qr_link = $qrCode;
        $candidate->save();

        return redirect()->route('candidates.index')
                        ->with('success', 'Candidate updated successfully');
    }



    public function show(Candidate $candidate)
    {
        $sites = Site::all();
        $careers = Career::all();
        $addendums = Addendum::all();
        $agreements = Agreement::all();
        return view('desktop.candidates.show', compact('candidate','addendums', 'sites', 'careers', 'agreements'));
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
    // Cek apakah pembaruan berhasil sebelum mencatat riwayat
        if ($candidate->wasChanged()) {
            $statory = new Statory;
            $statory->status = $request->status;
            $statory->candidate_id = $candidate->id; // Menggunakan ID dari candidate yang telah di-update
            $statory->save();
        }
        
        return redirect()->route('candidates.index')
                        ->with('success','Candidate updated successfully');
    }

    public function destroy(Candidate $candidate)
    {
        $candidateId = $candidate->id;
    
        // Hapus Statory yang berkaitan dengan candidate_id yang akan dihapus
        Statory::where('candidate_id', $candidateId)->delete();
    
        // Hapus Candidate
        $candidate->delete();
    
        return redirect()->route('candidates.index')
                        ->with('success', 'Candidate and associated Statory deleted successfully');
    }
}
