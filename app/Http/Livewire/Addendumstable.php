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
            $data = Addendum::whereHas('site', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('company', 'company', 'like', '%' . $this->search . '%');
                })
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Addendum::paginate(10);
        }
    
        return view('desktop.livewire.addendumstable', compact('data'));
    }    
}
