<?php

namespace App\Http\Livewire\Admin\Insumos;

use App\Models\Insumo;
use Livewire\Component;
use Livewire\WithPagination; 

class InsumosIndex extends Component
{

    use WithPagination;

    public $search;

    
    protected $paginationTheme = "bootstrap";


    public function updatingSearch(){
      $this->resetPage();
    }


    public function render()
    {

        $insumos = Insumo::where('name','LIKE','%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.insumos.insumos-index',compact('insumos'));
    }
}
