<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Itemreq extends Component
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
            $data = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('accurate_id', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Product::paginate(10);
        }

        return view('mobiles.livewire.itemreq', compact('data'));
    }
}
