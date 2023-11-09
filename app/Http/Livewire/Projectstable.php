<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projectstable extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap' ;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search != '') {
            $data = Project::where('departmentname', 'like', '%' . $this->search . '%')
                ->orWhere('customername', 'like', '%' . $this->search . '%')
                ->orWhere('accountname', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Project::paginate(10);
        }

        return view('desktop.livewire.projectstable', compact('data'));
    }
}
