<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Taxcategory;
use Livewire\WithPagination;

class Taxcategoriestable extends Component
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
            $data = Taxcategory::where('taxcategory', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Taxcategory::paginate(10);
        }
        return view('livewire.taxcategoriestable', compact('data'));
    }
}
