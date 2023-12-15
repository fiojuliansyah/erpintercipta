<?php

namespace App\Http\Livewire;

use App\Models\Site;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ExportEmployees;
use Maatwebsite\Excel\Facades\Excel;

class Employeestable extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedIds = [];
    public $selectedCompany = null;
    public $selectedProject = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        if (count($this->selectedIds) > 0) {
            $selectedData = User::whereIn('id', $this->selectedIds)->get();
    
            $modifiedData = $selectedData->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    
                ];
            });
    
            return Excel::download(new ExportEmployees($modifiedData), 'untuk_import_pkwt.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function render()
    {
        $companies = Company::all();
        $projects = Site::all();
    
        $data = User::query()
            ->whereDoesntHave('roles')
            ->whereHas('profile', function ($query) {
                $query->whereNotNull('department');
            });

        if ($this->search != '') {
            $data->where('name', 'like', '%' . $this->search . '%');
        }
    
        if ($this->selectedCompany) {
            $data->whereHas('pkwt.agreement.addendum.site', function ($query) {
                $query->where('company_id', $this->selectedCompany);
            });
        }
    
        if ($this->selectedProject) {
            $data->whereHas('pkwt.agreement.addendum.site', function ($query) {
                $query->where('id', $this->selectedProject);
            });
        }
    
        $data = $data->paginate(10);
    
        return view('desktop.livewire.employeestable', compact('data', 'companies', 'projects'));
    }    
    
    
}
