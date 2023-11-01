<?php

namespace App\Http\Livewire;

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
                    'addendum_id' => null,
                    'no_pkwt' => null,
                    'id' => $user->id,
                    'name' => $user->name,
                    'department' => $user->profile['department'],
                    'project' => $user->profile['project'],
                    'area' => $user->profile['area'],
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
    
        $data = User::query()
            ->whereDoesntHave('roles')
            ->whereHas('profile', function ($query) {
                $query->whereNotNull('department');
            });
    
        if ($this->selectedCompany) {
            $data->whereHas('pkwt.addendum', function ($query) {
                $query->where('company_id', $this->selectedCompany);
            });
        }
    
        $data = $data->paginate(10);
    
        return view('livewire.employeestable', compact('data', 'companies'));
    }
    
    
}
