<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithPagination;

class Jobstable extends Component
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
            $data = Career::whereRelation('company', 'company', 'like', '%' . $this->search . '%')
                ->orWhere('jobname', 'like', '%' . $this->search . '%')
                ->orWhere('department', 'like', '%' . $this->search . '%')
                ->orWhere('location', 'like', '%' . $this->search . '%')
                ->orWhere('graduate', 'like', '%' . $this->search . '%')
                ->orWhere('salary', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Career::paginate(10);
        }

        return view('livewire.jobstable', compact('data'));
    }
}
