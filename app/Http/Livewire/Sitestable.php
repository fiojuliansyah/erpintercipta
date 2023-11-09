<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class Sitestable extends Component
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
            $data = Site::where('name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Site::paginate(10);
        }
        return view('dekstop.livewire.sitestable', compact('data'));
    }
}
