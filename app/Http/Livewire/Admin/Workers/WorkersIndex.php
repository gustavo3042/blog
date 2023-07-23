<?php

namespace App\Http\Livewire\Admin\Workers;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\Worker;

class WorkersIndex extends Component
{

    use withPagination;

    protected $paginationTheme= "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $allWorkers = Worker::where('rut','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(10);
        
        return view('livewire.admin.workers.workers-index',compact('allWorkers'));
    }
}
