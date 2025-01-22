<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
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

      //  dd(Auth::user()->id);

      if (Auth::user()->hasRole('Admin')) {

        $checkl = CheckList::with('images','autos')
        ->where('patente','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5); 
        
      }elseif(Auth::user()->hasRole('Mecanico')){

        $checkl = CheckList::with('images','autos')
        ->where('user_id','=', auth()->user()->id)
        ->where('patente','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5); 
      }

     

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
