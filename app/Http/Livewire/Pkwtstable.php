<?php

namespace App\Http\Livewire;

use App\Models\Pkwt;
use App\Models\Site;
use App\Models\Company;
use App\Models\Addendum;
use Livewire\Component;
use App\Exports\ExportPkwts;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Pkwtstable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedIds = [];
    public $selectedCompany = null;
    public $selectedProject = null;
    public $selectedTitle = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        if (count($this->selectedIds) > 0) {
            $selectedData = Pkwt::whereIn('id', $this->selectedIds)->get();

            $modifiedData = $selectedData->map(function ($pkwt) {
                return [
                    'agreement_id' => $pkwt->agreement_id,
                    'reference_number' => 'No. ' . $pkwt->pkwt_number . '/' . ($pkwt->addendum ? $pkwt->addendum->company['cmpy'] : '') . '/HR-' . ($pkwt->addendum ? $pkwt->addendum['area'] : '') . '/' . ($pkwt->addendum ? $pkwt->addendum['romawi'] : '') . '/' . ($pkwt->addendum ? $pkwt->addendum['year'] : ''),
                    'user_id' => isset($pkwt->user['name']) ? $pkwt->user['name'] : null,
                    'company_id' => isset($pkwt->addendum?->company['company']) ? $pkwt->addendum?->company['company'] : null,
                    'month' => $pkwt->agreement['romawi'],
                    'year' => $pkwt->agreement['year'],
                    'project' => $pkwt->agreement->addendum->site['name'],
                    'area' => $pkwt->agreement['area'],
                ];
            });

            return Excel::download(new ExportPkwts($modifiedData), 'selected_pkwt_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function render()
    {
        $companies = Company::all();
        $projects = Site::all();
        $addendums = Addendum::all();

        $query = Pkwt::query();

        // Applying search filter
        if ($this->search) {
            $query->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }
    
        // Applying company filter
        if ($this->selectedCompany) {
            $query->whereHas('agreement.addendum.site', function ($query) {
                $query->where('company_id', $this->selectedCompany);
            });
        }
    
        // Applying project filter
        if ($this->selectedProject) {
            $query->whereHas('agreement.addendum.site', function ($query) {
                $query->where('id', $this->selectedProject);
            });
        }

        // Applying title filter
        if ($this->selectedTitle) {
            $query->whereHas('agreement.addendum', function ($query) {
                $query->where('title', $this->selectedTitle);
            });
        }
    
        // Fetching paginated results
        $data = $query->paginate(10);
    
        return view('desktop.livewire.pkwtstable', compact('data', 'companies', 'projects', 'addendums'));
    }
}
