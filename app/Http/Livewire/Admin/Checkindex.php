<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;
use App\Models\Image;
use Livewire\WithPagination;



class Checkindex extends Component
{


    use WithPagination;

    protected $paginationTheme= "bootstrap";
  
    public $search;
    public $selectedImage;
  
    public function updatingSearch(){
  
    $this->resetPage();

    }
 

    public function showImage($imageUrl)
    {
        $this->selectedImage = $imageUrl;
        $this->dispatchBrowserEvent('show-image-modal');
    }
  

    public function render()
    {

        $checkl = CheckList::with('images')
        ->where('user_id','=', auth()->user()->id)
        ->where('patente','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5); 

        return view('livewire.admin.checkindex',compact('checkl'));
    }



    public function most($id){

     
       
     

    }

  /*   public function closeModal(){

        $this->resetInput();
    }

    public function resetInput(){

        $this->imagens = '';

    } */
}
