<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Departmentstable extends Component
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
            $data = Department::whereRelation('customer', 'customername', 'like', '%' . $this->search . '%')
                ->orWhere('departmentname', 'like', '%' . $this->search . '%')
                ->orWhere('user_id', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Department::paginate(10);
        }

        return view('dekstop.livewire.departmentstable', compact('data'));
    }
}
