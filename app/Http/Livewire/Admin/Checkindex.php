<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;
use App\Models\Image;
use App\Models\Presupuesto;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Storage;
use PDF;



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

    public function pdfPresupuesto($id){


    /* 
      
    Esta version nos lleva a una vista primero y despues se puede imprimir o guardar como pdf
      $id = $id;
    $pdf = PDF::loadView('admin.check.pdfPresupuesto',compact('id'));
      return $pdf->setPaper('Doc')->stream('Presupuesto');  */

      //esta la version correcta para descargar un pdf inmediatamente


      $check = CheckList::with('presupuestos','clientes','autos')->where('id',$id)->get();

      $jobs = Presupuesto::with('presupuestosDetails')->where('check_lists_id',$id)->get();

      //dd($jobs);

      $pdf = FacadePdf::loadView('admin.check.pdfPresupuesto',['jobs'=>$jobs]);


      // Descargar el PDF
      return response()->streamDownload(
        fn () => print($pdf->output()), 
        "presupuesto_$id.pdf"
    ); 
     

    }
  

    public function render()
    {

      //  dd(Auth::user()->id);

      if (Auth::user()->hasRole('Admin')) {

        $checkl = CheckList::with('images','autos')
        ->where('patente','LIKE','%'.$this->search.'%')
       // ->where('fecha','LIKE','%'.$this->search.'%')
       
        ->latest('id')
        ->paginate(5); 
        
      }elseif(Auth::user()->hasRole('Mecanico')){

        $checkl = CheckList::with('images','autos')
        ->where('user_id','=', auth()->user()->id)
        ->where('patente','LIKE','%'.$this->search.'%')
        //->where('fecha','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5); 
      }

     

        return view('livewire.admin.checkindex',compact('checkl'));
    }



   

  /*   public function closeModal(){

        $this->resetInput();
    }

    public function resetInput(){

        $this->imagens = '';

    } */
}
