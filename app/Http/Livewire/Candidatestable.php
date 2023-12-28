<?php

namespace App\Http\Livewire;

use App\Models\Site;
use App\Models\Career;
use App\Models\Statory;
use Livewire\Component;
use App\Models\Addendum;
use App\Models\Training;
use App\Models\Agreement;
use App\Models\Candidate;
use Livewire\WithPagination;
use App\Exports\ExportCandidates;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\CandidateUpdate;
use Illuminate\Http\Request;

class Candidatestable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedIds = [];
    protected $request;
    public $selectedStatus;
    public $selectedCareerId;
    public $selectedDescriptionUser;
    public $selectedDescriptionClient;
    public $selectedDate;
    public $selectedSiteId;
    public $selectedResponsible;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getHiddenUserIds()
    {
        return Training::pluck('user_id')->toArray();
    }

    public function exportSelected()
    {
        if (count($this->selectedIds) > 0) {
            $selectedData = Candidate::whereIn('id', $this->selectedIds)
                ->with(['career', 'user'])
                ->whereNotIn('user_id', $this->getHiddenUserIds()) // Menyembunyikan data dengan user_id yang ada di trainings
                ->get();

            $modifiedData = $selectedData->map(function ($candidate) {
                return [
                    'company' => $candidate->career->company['company'],
                    'company_id' => $candidate->career->company['id'],
                    'user' => $candidate->user->name,
                    'user_id' => $candidate->user->id,
                    'nickname' => $candidate->user->profile['nickname'],
                    'address' => $candidate->user->profile['address'],
                    'birth_place' => $candidate->user->profile['birth_place'],
                    'birth_date' => $candidate->user->profile['birth_date'],
                    'religion' => $candidate->user->profile['religion'],
                    'person_status' => $candidate->user->profile['person_status'],
                    'mother_name' => $candidate->user->profile['mother_name'],
                    'family_name' => $candidate->user->profile['family_name'],
                    'family_address' => $candidate->user->profile['family_address'],
                    'weight' => $candidate->user->profile['weight'],
                    'height' => $candidate->user->profile['height'],
                    'hobby' => $candidate->user->profile['hobby'],
                    'bank_account' => $candidate->user->profile['bank_account'],
                    'bank_name' => $candidate->user->profile['bank_name'],
                    'reference' => $candidate->user->profile['reference'],
                    'reference_job' => $candidate->user->profile['reference_job'],
                    'reference_relation' => $candidate->user->profile['reference_relation'],
                    'reference_address' => $candidate->user->profile['reference_address'],
                    'nik_number' => $candidate->user->nik_number,
                    'family_number' => $candidate->user->profile['family_number'],
                    'npwp_number' => $candidate->user->profile['npwp_number'],
                    'active_date' => $candidate->user->profile['active_date'],
                ];
            });

            return Excel::download(new ExportCandidates($modifiedData), 'selected_candidate_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function mount(Request $request)
    {
        $this->request = $request;
    }

    public function updateSelected(Request $request)
    {   
        if (count($this->selectedIds) > 0) {
            foreach ($this->selectedIds as $candidateId) {
                $candidate = Candidate::find($candidateId);

                if ($candidate) {
                    $candidate->status = $this->selectedStatus;
                    $candidate->career_id = $this->selectedCareerId;
                    $candidate->description_user = $this->selectedDescriptionUser;
                    $candidate->description_client = $this->selectedDescriptionClient;
                    $candidate->site_id = $this->selectedSiteId;
                    $candidate->date = $this->selectedDate;
                    $candidate->responsible = $this->selectedResponsible;

                    $candidate->update();
                    
                    // Cek apakah pembaruan berhasil sebelum mencatat riwayat
                    if ($candidate->wasChanged()) {
                        $statory = new Statory;
                        $statory->status = $candidate->id;
                        $statory->candidate_id = $candidate->id; // Menggunakan ID dari candidate yang telah di-update
                        $statory->save();
                    }

                    // Mengirim notifikasi
                    $notifiable = $candidate->user;
                    $phone = $candidate->user->phone; // Mendapatkan nomor telepon dari user

                    if ($notifiable && $phone) {
                        $notifiable->notify(new CandidateUpdate(
                            $candidate->status,
                            $candidate->description_user,
                            $candidate->responsible,
                            $candidate->date,
                            $phone // Mengirimkan nomor telepon ke constructor notifikasi
                        ));
                    }
                }
            }

            // Setelah update, bersihkan input
            $this->resetInputFields();

            session()->flash('success', 'Selected candidates updated successfully.');
        } else {
            session()->flash('error', 'No candidates selected for update.');
        }
    }

    public function resetInputFields()
    {
        $this->selectedStatus = null;
        $this->selectedCareerId = null;
        $this->selectedDescriptionUser = null;
        $this->selectedDescriptionClient = null;
        $this->selectedSiteId = null;
        $this->selectedDate = null;
        $this->selectedResponsible = null;
    }

    public function submitUpdate()
    {
        $this->updateSelected($this->request);

        // Lakukan apapun yang diperlukan setelah update, misalnya mengambil data baru, mengosongkan input, atau menampilkan pesan sukses.
        // Contoh:
        $this->selectedIds = []; // Mengosongkan kembali selectedIds setelah update
        $this->resetInputFields(); // Mengosongkan nilai input setelah update
        session()->flash('success', 'Selected candidates updated successfully.');
    }

    public function render()
    {
        $sites = Site::all();
        $careers = Career::all();
        $addendums = Addendum::all();
        $agreements = Agreement::all();
        $hiddenUserIds = $this->getHiddenUserIds();

        if ($this->search != '') {
            $data = Candidate::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('career', 'jobname', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->whereNotIn('user_id', $hiddenUserIds) // Menyembunyikan data dengan user_id yang ada di trainings
                ->paginate(10);
        } else {
            $data = Candidate::whereNotIn('user_id', $hiddenUserIds) // Menyembunyikan data dengan user_id yang ada di trainings
                ->paginate(10);
        }

        return view('desktop.livewire.candidatestable', compact('data','addendums', 'sites', 'careers', 'agreements'));
    }
}
