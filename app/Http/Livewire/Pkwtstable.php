<?php

namespace App\Http\Livewire;

use App\Models\Pkwt;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;
// use App\Imports\ImportPkwts;
use App\Exports\ExportPkwts;
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
                    'reference_number' => 'No. ' . $pkwt->pkwt_number . '/' . ($pkwt->addendum ? $pkwt->addendum->company['cmpy'] : '') . '/HR-' . ($pkwt->addendum ? $pkwt->addendum['area'] : '') . '/' . ($pkwt->addendum ? $pkwt->addendum['romawi'] : '') . '/' . ($pkwt->addendum ? $pkwt->addendum['year'] : ''),
                    'user_id' => isset($pkwt->user['name']) ? $pkwt->user['name'] : null,
                    'company_id' => isset($pkwt->addendum?->company['company']) ? $pkwt->addendum?->company['company'] : null,
                    'month' => $pkwt->addendum['romawi'],
                    'year' => $pkwt->addendum['year'],
                    'project' => $pkwt->addendum['project'],
                    'area' => $pkwt->addendum['area'],
                ];
            });
    
            return Excel::download(new ExportPkwts($modifiedData), 'selected_pkwt_data.xlsx');
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }

    public function exportPdf()
    {
        if (count($this->selectedIds) > 0) {
            // Initialize an instance of the PDF class
            $pdf = app('dompdf.wrapper');
    
            foreach ($this->selectedIds as $id) {
                // Fetch data for the current ID
                $data = Pkwt::find($id);
    
                // Check if data was found for the current ID
                if ($data) {
                    // Generate a PDF with the data for the current ID
                    $pdf->loadView('pkwts.export', compact('data'));
    
                    // Define a unique filename for the PDF based on the current ID
                    $filename = 'pkwt_' . $data->id . '_export_' . now()->format('Y-m-d_H-i-s') . '.pdf';
    
                    // Generate and return the PDF as a downloadable response
                    $pdf->stream($filename);
                }
            }
        } else {
            session()->flash('error', 'No data selected for export.');
        }
    }    


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

