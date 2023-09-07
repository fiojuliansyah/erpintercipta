<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Applicant;
use Livewire\WithPagination;
use App\Exports\ExportApplicants;
use Maatwebsite\Excel\Facades\Excel;

class Applicantstable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedIds = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        if (count($this->selectedIds) > 0) {
            $selectedData = Applicant::whereIn('id', $this->selectedIds)
                ->with(['career', 'user' ])
                ->get();
    
            $modifiedData = $selectedData->map(function ($applicant) {
                return [
                    'company' => $applicant->career->company['company'],
                    'company_id' => $applicant->career->company['id'],
                    'user' => $applicant->user->name,
                    'user_id' => $applicant->user->id,
                    'nickname' => $applicant->user->profile['nickname'],
                    'address' => $applicant->user->profile['address'],
                    'birth_place' => $applicant->user->profile['birth_place'],
                    'birth_date' => $applicant->user->profile['birth_date'],
                    'religion' => $applicant->user->profile['religion'],
                    'person_status' => $applicant->user->profile['person_status'],
                    'mother_name' => $applicant->user->profile['mother_name'],
                    'family_name' => $applicant->user->profile['family_name'],
                    'family_address' => $applicant->user->profile['family_address'],
                    'weight' => $applicant->user->profile['weight'],
                    'height' => $applicant->user->profile['height'],
                    'hobby' => $applicant->user->profile['hobby'],
                    'bank_account' => $applicant->user->profile['bank_account'],
                    'bank_name' => $applicant->user->profile['bank_name'],
                    'reference' => $applicant->user->profile['reference'],
                    'reference_job' => $applicant->user->profile['reference_job'],
                    'reference_relation' => $applicant->user->profile['reference_relation'],
                    'reference_address' => $applicant->user->profile['reference_address'],
                    'nik_number' => $applicant->user->profile['nik_number'],
                    'family_number' => $applicant->user->profile['family_number'],
                    'npwp_number' => $applicant->user->profile['npwp_number'],
                    'active_date' => $applicant->user->profile['active_date'],
                ];
            });
    
            return Excel::download(new ExportApplicants($modifiedData), 'selected_applicant_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function render()
    {
        if ($this->search != '') {
            $data = Applicant::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('career', 'jobname', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Applicant::paginate(10);
        }

        return view('livewire.applicantstable', compact('data'));
    }
}
