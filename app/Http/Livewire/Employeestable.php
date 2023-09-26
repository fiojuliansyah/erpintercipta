<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ExportEmployees;
use Maatwebsite\Excel\Facades\Excel;

class Employeestable extends Component
{
    use withPagination;
    
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
            $selectedData = User::whereIn('id', $this->selectedIds)
                ->get();
    
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
        if ($this->search != '') {
            $data = User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->whereDoesntHave('roles') // Menyaring pengguna yang tidak memiliki peran
                ->paginate(10);
        } else {
            $data = User::whereDoesntHave('roles') // Menyaring pengguna yang tidak memiliki peran
                ->paginate(10);
        }

        return view('livewire.employeestable', compact('data'));
    }

}
