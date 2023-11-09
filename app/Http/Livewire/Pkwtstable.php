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
        if ($this->search != '') {
            $data = Pkwt::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Pkwt::paginate(10);
        }

        return view('desktop.livewire.pkwtstable', compact('data'));
    }
}
