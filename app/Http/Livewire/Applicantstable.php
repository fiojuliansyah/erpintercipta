<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;
use App\Models\Applicant;
use Livewire\WithPagination;

class Applicantstable extends Component
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
            $data = Career::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('career', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Career::paginate(10);
        }

        return view('livewire.applicantstable', compact('data'));
    }
}
