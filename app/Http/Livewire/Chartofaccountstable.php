<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Chartofaccount;

class Chartofaccountstable extends Component
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
            $data = Chartofaccount::whereRelation('customer', 'customername', 'like', '%' . $this->search . '%')
                ->orWhere('accountname', 'like', '%' . $this->search . '%')
                ->orWhere('accounttype_id', 'like', '%' . $this->search . '%')
                ->orWhere('user_id', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Chartofaccount::paginate(10);
        }

        return view('desktop.livewire.chartofaccountstable', compact('data'));
    }
}
