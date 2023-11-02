<?php

namespace App\Http\Livewire;

use App\Models\Site;
use App\Models\Company;
use Livewire\Component;
use App\Models\Training;
use Livewire\WithPagination;

class Gncstable extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $selectedIds = [];
    public $selectedProject = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $companies = Company::all();
        $projects = Site::all();
        
        $dataQuery = Training::query();
        
        if ($this->search != '') {
            $dataQuery->whereRelation('user', 'name', 'like', '%' . $this->search . '%');
        }
        
        // Menambahkan filter berdasarkan proyek yang dipilih
        if ($this->selectedProject) {
            $dataQuery->whereHas('site', function ($query) {
                $query->where('id', $this->selectedProject);
            });
        }
    
        $data = $dataQuery->paginate(10);
    
        return view('livewire.gncstable', compact('data', 'projects'));
    }
    
}
