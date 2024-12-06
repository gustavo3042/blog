<?php

namespace App\Http\Livewire\Admin\Insumos;

use App\Models\ImageInsumo;
use App\Models\Insumo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsumosEdit extends Component
{

    use WithFileUploads;

    public $insumo_id;
    public $name;
    public $descripcion;
    public $stock;
    public $precio;
    public $precioCompra;
    public $status;
    public $tipoProducto;
    public $file;
    public $fileAnt;

    protected $listeners = ['update'];

    public function mount($id){

     

        $most = Insumo::find($id);

        $this->insumo_id = $most->id; 
        $this->name = $most->name;
        $this->descripcion = $most->descripcion;
        $this->stock = $most->stock;
        $this->precio = $most->precio;
        $this->precioCompra = $most->precioCompra;
        $this->tipoProducto = $most->tipoProducto;
        $this->fileAnt = $most->imageInsumo->url ?? null;

      //  dd($this->file);


      //  dd($most);

    }

    public function render()
    {
        return view('livewire.admin.insumos.insumos-edit');
    }


    public function update()
    {


        $update = Insumo::find($this->insumo_id)->update([

            'name' => $this->name,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'precioCompra' => $this->precioCompra,
            'status' => 1,
            'tipoProducto' => $this->tipoProducto
        ]);

        

        //dd($this->fileAnt);



       $insumosImages = ImageInsumo::where('imageable_id',$this->insumo_id)->first();

        if ($this->file) {

            $url = Storage::put('insumos', $this->file);

          //  dd($url);
    
    
            if ($this->file) {
    
              Storage::delete($this->fileAnt);
    
              $updateImage = ImageInsumo::where('imageable_id',$this->insumo_id)->update([
    
    
              'url' => $url
    
              ]);
    
            }else {
    
                 $updateImage = ImageInsumo::create([
                
                  'url' => $url
                  
    
                ]); 

               /*  $update->imageInsumo()->create([
     
                  'url'=> $url
         
                ]); */
    
            }
      
       
    }else{


      /* //dd('holis',$this->insumo_id);
      $url = Storage::put('insumos',$this->file);

      

       $updateImage = ImageInsumo::create([
                
        'url' => $url,
        'imageable_id' => $this->insumo_id

      ]);   */

    }


    $this->emit('registroEditado');
    $this->resetInput();
    return redirect()->route('insumos.index');
   
}

public function resetInput()
{

$this->name = '';
$this->descripcion = '';
$this->stock = '';
$this->precio = '';
$this->precioCompra = '';
$this->status = '';
$this->tipoProducto = '';
$this->file = '';

 
}

}