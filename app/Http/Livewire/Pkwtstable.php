<?php

namespace App\Http\Livewire;

use App\Models\Pkwt;
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        if (count($this->selectedIds) > 0) {
            $selectedData = Pkwt::whereIn('id', $this->selectedIds)->get();

            return Excel::download(new ExportPkwts($selectedData), 'selected_pkwt_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function render()
    {
        if ($this->search != '') {
            $data = Pkwt::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('company', 'company', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Pkwt::paginate(10);
        }

        return view('livewire.pkwtstable', compact('data'));
    }
}

