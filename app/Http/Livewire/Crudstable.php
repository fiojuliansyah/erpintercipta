<?php

namespace App\Http\Livewire;

use App\Models\Crud;
use Livewire\Component;
use Livewire\WithPagination;

class Crudstable extends Component
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
            $data = Crud::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('detail', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Crud::paginate(10);
        }

        return view('desktop.livewire.crudstable', compact('data'));
    }
}
