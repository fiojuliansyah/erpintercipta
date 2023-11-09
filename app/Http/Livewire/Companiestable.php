<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Companiestable extends Component
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
            $data = Company::where('company', 'like', '%' . $this->search . '%')
                ->orWhere('cmpy', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Company::paginate(10);
        }

        return view('desktop.livewire.companiestable', compact('data'));
    }
}
