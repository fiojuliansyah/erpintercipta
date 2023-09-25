<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class Permissionstable extends Component
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
            $data = Permission::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('guard_name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Permission::paginate(10);
        }
        return view('livewire.permissionstable', compact('data'));
    }
}
