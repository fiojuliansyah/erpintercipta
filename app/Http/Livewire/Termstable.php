<?php

namespace App\Http\Livewire;

use App\Models\Term;
use Livewire\Component;
use Livewire\WithPagination;

class Termstable extends Component
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
            $data = Term::where('term', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Term::paginate(10);
        }
        return view('desktop.livewire.termstable', compact('data'));
    }
}
