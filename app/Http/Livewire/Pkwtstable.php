<?php

namespace App\Http\Livewire;

use App\Models\Pkwt;
use Livewire\Component;
use Livewire\WithPagination;

class Pkwtstable extends Component
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
            $data = Pkwt::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('company', 'company', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Pkwt::paginate(10);
        }

        return view('livewire.pkwtstable', compact('data'));
    }
}
