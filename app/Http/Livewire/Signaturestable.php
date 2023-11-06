<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Signature;
use Livewire\WithPagination;

class Signaturestable extends Component
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
            $data = Signature::whereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Signature::paginate(10);
        }
        return view('livewire.signaturestable', compact('data'));
    }
}
