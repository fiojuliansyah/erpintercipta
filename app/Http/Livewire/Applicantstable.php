<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;
use App\Exports\ExportEmployees;
use Maatwebsite\Excel\Facades\Excel;

class Applicantstable extends Component
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
    
            return Excel::download(new ExportApplicants($modifiedData), 'untuk_import_pkwt.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function render()
    {
        $agent = new Agent;
        
        if ($this->search != '') {
            $data = User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
            ->whereDoesntHave('roles')
            ->whereHas('profile', function ($query) {
                $query->where('department', null);
            })
            ->whereDoesntHave('candidate')
            ->orderBy('created_at', 'desc') // Menyortir berdasarkan kolom created_at secara descending (terbaru paling atas)
            ->paginate(10);
        } else {
            $data = User::whereDoesntHave('roles')
                ->whereHas('profile', function ($query) {
                    $query->where('department', null);
                })
                ->whereDoesntHave('candidate')
                ->orderBy('created_at', 'desc') // Menyortir berdasarkan kolom created_at secara descending (terbaru paling atas)
                ->paginate(10);
        }

        if ($agent->isDekstop()) {
            return view('desktop.livewire.applicantstable', compact('data'));
        } elseif ($agent->isMobile()) {
            return view('mobiles.livewire.applicantstable', compact('data'));
        }
        return view('desktop.livewire.applicantstable', compact('data'));
    }
       

}
