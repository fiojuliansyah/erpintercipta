<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customerstable extends Component
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
            $data = Customer::where('customername', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('contact', 'like', '%' . $this->search . '%')
                ->orWhere('taxnumber', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Customer::paginate(10);
        }

        return view('livewire.customerstable', compact('data'));
    }
}
