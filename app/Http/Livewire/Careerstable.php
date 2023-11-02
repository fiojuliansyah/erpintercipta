<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithPagination;

class Careerstable extends Component
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
            $data = Career::where('jobname', 'like', '%' . $this->search . '%')
                ->orWhere('department', 'like', '%' . $this->search . '%')
                ->orwhereRelation('company','company', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Career::paginate(10);
        }

        return view('livewire.careerstable', compact('data'));
    }
}
