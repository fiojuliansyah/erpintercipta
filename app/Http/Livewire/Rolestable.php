<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Rolestable extends Component
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
            $data = Role::where('name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Role::paginate(10);
        }

        return view('livewire.rolestable', compact('data'));
    }
}
