<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\OrdenServicio;
use Livewire\withPagination;


class OrdenIndex extends Component
{


use withPagination;

  protected $paginationTheme= "bootstrap";

  public $search;

  public function updatingSearch(){

$this->resetPage();

  }

    public function render()
    {



$ordenes = OrdenServicio::where('user_id','=', auth()->user()->id)
->where('patente','LIKE','%'.$this->search.'%')
->latest('id')
->paginate(5);



        return view('livewire.admin.orden-index',compact('ordenes'));
    }

}
