<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use App\Models\Training;
use App\Models\Candidate;
use Livewire\WithPagination;
use App\Exports\ExportCandidates;
use Maatwebsite\Excel\Facades\Excel;

class Nccstable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedProject = null;
    public $selectedIds = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateSelected(Request $request)
    {   
        if (count($this->selectedIds) > 0) {
            // Mendapatkan user_id dari data candidat yang terpilih
            $userIds = Candidate::whereIn('id', $this->selectedIds)->pluck('user_id')->toArray();

            foreach ($this->selectedIds as $index => $selectedId) {
                $candidate = Candidate::find($selectedId);

                if ($candidate) {
                    $candidate->user_id = $userIds[$index];
                    $candidate->status = $this->status;
                    $candidate->career_id = $this->career_id;
                    $candidate->description_user = $this->description_user;
                    $candidate->description_client = $this->description_client;
                    $candidate->site_id = $this->site_id;
                    $candidate->date = $this->date;
                    $candidate->responsible = $this->responsible;

                    $candidate->save();
                    
                    if ($candidate->wasChanged()) {
                        $statory = new Statory;
                        $statory->status = $candidate->status;
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
                }
            }
            session()->flash('success', 'Selected candidates updated successfully.');
        } else {
            session()->flash('error', 'No candidates selected for update.');
        }
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

    public function render()
    {
        $projects = Site::all();
        $dataQuery = Candidate::query();

        if ($this->search != '') {
            $dataQuery->whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('site', 'name', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->paginate(10);
        }    

        if ($this->selectedProject) {
            $dataQuery->whereHas('site', function ($query) {
                $query->where('id', $this->selectedProject);
            });
        }

        $data = $dataQuery->paginate(10);

        return view('desktop.livewire.nccstable', compact('data', 'projects'));
    }
}
