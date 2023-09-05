<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Addendum;
use Livewire\WithPagination;

class Addendumstable extends Component
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
            $data = Addendum::where('addendum', 'like', '%' . $this->search . '%')
                ->orWhere('skk', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Addendum::paginate(10);
        }

        return view('livewire.addendumstable', compact('data'));
    }
}
