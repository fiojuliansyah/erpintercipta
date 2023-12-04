<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use App\Exports\ExportPkwts;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Productstable extends Component
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
        $agent = new Agent;
        
        if ($this->search != '') {
            $data = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('accurate_id', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Product::paginate(10);
        }

        if ($agent->isDekstop()) {
            return view('desktop.livewire.productstable', compact('data'));
        } elseif ($agent->isMobile()) {
            return view('mobiles.livewire.productstable', compact('data'));
        }
        return view('desktop.livewire.productstable', compact('data'));
    }
}
