<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class Vendorstable extends Component
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
            $data = Vendor::where('vendorname', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Vendor::paginate(10);
        }

        return view('desktop.livewire.vendorstable', compact('data'));
    }
}
