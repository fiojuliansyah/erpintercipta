<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agreement;
use Livewire\WithPagination;

class Agreementstable extends Component
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
            $data = Agreement::whereHas('addendum', function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('site', 'name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('department', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Agreement::paginate(10);
        }

        return view('desktop.livewire.agreementstable', compact('data'));
    }
}
