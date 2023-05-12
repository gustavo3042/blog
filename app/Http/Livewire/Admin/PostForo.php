<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PostForoConsultas;
use Livewire\withPagination;

class PostForo extends Component
{


    use withPagination;

    protected $paginationTheme= "bootstrap";
  
    public $search;
  
    public function updatingSearch(){
  
    $this->resetPage();
  
    }

    public function render()
    {



        $postsForo = PostForoConsultas::where('user_id',auth()->user()->id)
        ->where('fecha','LIKE','%'.$this->search.'%')
         ->latest('id')
        ->paginate(5);




        return view('livewire.admin.post-foro',compact('postsForo'));
    }
}
