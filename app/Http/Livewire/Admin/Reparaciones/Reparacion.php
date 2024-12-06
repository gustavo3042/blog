<?php

namespace App\Http\Livewire\Admin\Reparaciones;

use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\Reparaciones;

class Reparacion extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";



    public function updatingSearch(){
      $this->resetPage();
    }

    public function render()
    {
        
        $reparaciones = Reparaciones::where('name','LIKE','%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.reparaciones.reparacion',compact('reparaciones'));
    }
}
