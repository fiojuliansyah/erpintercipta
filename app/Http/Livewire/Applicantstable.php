<?php

namespace App\Http\Livewire;

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
            $data = Applicant::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('career', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Applicant::paginate(10);
        }

        return view('livewire.applicantstable', compact('data'));
    }
}
