<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\Insumo;
use App\Models\Venta;
use Carbon\Carbon;
use Livewire\Component;

class VentasCreate extends Component
{

    public $insumo_id;
    public $name;
    public $descripcion;
    public $venta;
    public $stock;
    public $precioVenta;

    public function mount($id){

        $this->insumo_id = $id;
        $most = Insumo::find($this->insumo_id);
        $this->name =  $most->name;
        $this->descripcion = $most->descripcion;
        $this->stock = $most->stock;
    
      //  dd($this->insumo_id);

    }

    public function render()
    {
        return view('livewire.admin.ventas.ventas-create');
    }


    public function storeVenta(){


        $insumoStock = Insumo::find($this->insumo_id);

        $stockPostVenta = $insumoStock->stock - $this->venta;
        $totalVenta = $this->venta * $this->precioVenta;

        $create = Venta::create([
            'venta'=> $this->venta,
            'precioVenta' => $this->precioVenta,
            'stockInicial'=> $this->stock,
            'stockPostVenta' => $stockPostVenta,
            'totalVenta' => $totalVenta,
            'fechaVenta' => Carbon::now(),
            'insumo_id' => $this->insumo_id
          //  'check_list_id' => 
        
        ]);

        $update = Insumo::find($this->insumo_id)->update([

            'stock' => $stockPostVenta

        ]);

        $this->emit('registroCreado');
        $this->resetInput();
        
        return redirect()->route('ventas.index');


    }


    public function resetInput()
    {

    $this->venta = '';
    $this->precioVenta = '';
     
    }
}
