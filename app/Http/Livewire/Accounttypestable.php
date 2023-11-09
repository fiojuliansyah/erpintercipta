<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Accounttype;
use Livewire\WithPagination;

class Accounttypestable extends Component
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
            $data = Accounttype::where('accounttype', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Accounttype::paginate(10);
        }
        return view('desktop.livewire.accounttypestable', compact('data'));
    }
}
