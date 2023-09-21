<?php

namespace App\Http\Livewire;

use App\Models\Pkwt;
use Livewire\Component;
use App\Exports\ExportPkwts;
// use App\Imports\ImportPkwts;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Pkwtstable extends Component
{
    use WithPagination;
    // use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $exportToExcel = false;
    public $search = '';
    public $selectedIds = [];
    // public $file;

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
                    'addendum_id' => $pkwt->addendum_id,
                    'user_id' => $pkwt->user['name'],
                    'reference_number' => $pkwt->reference_number,
                    'company_id' => $pkwt->company['company'],
                    'date' => $pkwt->date,
                    'month' => $pkwt->month,
                    'year' => $pkwt->year,
                    'project' => $pkwt->project,
                    'area' => $pkwt->area,
                    'salary' => $pkwt->salary,
                    'allowance' => $pkwt->allowance,
                    'place' => $pkwt->place,
                ];
            });
    
            return Excel::download(new ExportPkwts($modifiedData), 'selected_pkwt_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    // public function import()
    // {
    //     $this->validate([
    //         'file' => 'required|mimes:xlsx',
    //     ]);

    //     Excel::import(new ImportPkwts, $this->file);

    //     session()->flash('success', 'Data imported successfully.');

    //     // Reset the file input
    //     $this->file = null;
    // }

    public function render()
    {
        if ($this->search != '') {
            $data = Pkwt::where(function ($query) {
                $query->whereHas('user', function ($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('addendum', function ($subquery) {
                    $subquery->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('company', function ($subsubquery) {
                            $subsubquery->where('cmpy', 'like', '%' . $this->search . '%');
                        });
                });
            })->paginate(10);
        } else {
            $data = Pkwt::paginate(10);
        }
    
        return view('livewire.pkwtstable', compact('data'));
    }
    
}

