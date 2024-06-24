<?php

namespace App\Http\Livewire\Admin\Insumos;

use App\Models\Insumo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InsumosCreate extends Component
{

    use WithFileUploads;

    public $name;
    public $descripcion;
    public $stock;
    public $precio;
    public $precioCompra;
    public $status;
    public $tipoProducto;
    public $file;



    public function render()
    {
        return view('livewire.admin.insumos.insumos-create');
    }


    public function store(){


        $create = Insumo::create([

            'name' => $this->name,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'precioCompra' => $this->precioCompra,
            'status' => 1,
            'tipoProducto' => $this->tipoProducto
           
        ]);

        if ($this->file) { //pregunta si existe una imagen

            //mover imagen a la carpeta storage si cumple la condicion if
            $url = Storage::put('insumos', $this->file);  //el 'posts'corresponde a la carpeta y el '$request->file('file')' es donde esta esta por el momento la imagen
          // el Storage::put se encargara de mover la imagen a determinada carpeta
            $create->imageInsumo()->create([
     
              'url'=> $url
     
            ]);
          }


          $this->emit('registroCreado');
          $this->resetInput();

        //  return redirect()->route('insumos.index');
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
