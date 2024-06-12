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
        $this->fileAnt = $most->imageInsumo->url;

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
    
            }
      
       
    }
    $this->emit('registroEditado');
    return redirect()->route('insumos.index');
   
}

}