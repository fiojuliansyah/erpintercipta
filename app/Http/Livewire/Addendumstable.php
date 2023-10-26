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
                ->orWhereRelation('company', 'company', 'like', '%' . $this->search . '%')
                ->paginate(100);
        } else {
            $data = Addendum::paginate(100);
        }

        return view('livewire.addendumstable', compact('data'));
    }
}
