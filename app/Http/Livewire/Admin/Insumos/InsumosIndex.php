<?php

namespace App\Http\Livewire\Admin\Insumos;

use App\Models\ImageInsumo;
use App\Models\Insumo;
use Livewire\Component;
use Livewire\WithPagination; 

class InsumosIndex extends Component
{

    use WithPagination;

    public $search;

    protected $listeners = ['render','delete'];
    protected $paginationTheme = "bootstrap";

 


    public function updatingSearch(){
      $this->resetPage();
    }


    public function render()
    {

        $insumos = Insumo::where('name','LIKE','%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.insumos.insumos-index',compact('insumos'));
    }



    public function delete(Insumo $post){

      //dd($post->id); 

      $post->delete();
      $post->imageInsumo()->delete();

  /*     $imageDelete = ImageInsumo::find($post->id)->delete(); */

  

    }
}
