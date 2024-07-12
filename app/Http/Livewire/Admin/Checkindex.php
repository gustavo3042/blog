<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;

use Livewire\WithPagination;



class Checkindex extends Component
{


    use WithPagination;

    protected $paginationTheme= "bootstrap";
  
    public $search;
  
    public function updatingSearch(){
  
    $this->resetPage();
  
    }




    public function render()
    {

        $checkl = CheckList::where('user_id','=', auth()->user()->id)
        ->where('patente','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5);





        return view('livewire.admin.checkindex',compact('checkl'));
    }
}
