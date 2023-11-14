<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;

class Jobsportaltable extends Component
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
            $data = Career::where('status', 1)
                ->where(function($query) {
                    $query->whereRelation('company', 'company', 'like', '%' . $this->search . '%')
                        ->orWhere('jobname', 'like', '%' . $this->search . '%')
                        ->orWhere('department', 'like', '%' . $this->search . '%')
                        ->orWhere('location', 'like', '%' . $this->search . '%')
                        ->orWhere('graduate', 'like', '%' . $this->search . '%')
                        ->orWhere('salary', 'like', '%' . $this->search . '%');
                })
                ->paginate(5);
        } else {
            $data = Career::where('status', 1)->paginate(5);
        }
    
        // Assuming you have a way to determine the device type (replace 'isDesktop' and 'isMobile' with your actual logic)
        if ($agent->isDekstop()) {
            return view('desktop.livewire.jobsportaltable', compact('data'));
        } elseif ($agent->isMobile()) {
            return view('mobiles.livewire.jobsportaltable', compact('data'));
        }
        return view('desktop.livewire.jobsportaltable', compact('data'));
    }


}
