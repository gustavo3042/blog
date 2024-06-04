<?php

namespace App\Http\Livewire\Admin\Autos;

use Livewire\Component;
use App\Models\Autos;

use Livewire\WithPagination; 

class AutosIndex extends Component
{

    use WithPagination;

    public $search;


    public $autos_id;

    public $marca;
    public $modelo;
    public $ano;
    public $color;
    public $tipoDireccion;
    public $tipoTraccion;
    public $tipoCombustion;
    public $cilindrada;
    public $patente;
    public $kilometraje;

    protected $paginationTheme = "bootstrap";



   public function updatingSearch(){
     $this->resetPage();
   }


    public function render()
    {

        $autos = Autos::where('patente','LIKE','%'.$this->search.'%')->paginate(10);
       // dd($autos);

        return view('livewire.admin.autos.autos-index',compact('autos'));
    }


    public function editar($id){

        $most = Autos::find($id);
        $this->autos_id = $most->id;
        $this->patente = $most->patente;
        $this->marca = $most->marca;
        $this->modelo = $most->modelo;
        $this->ano = $most->ano;
        $this->color = $most->color;
        $this->tipoDireccion = $most->tipoDireccion;
        $this->tipoTraccion = $most->tipoTraccion;
        $this->tipoCombustion = $most->tipoCombustion;
        $this->cilindrada = $most->cilindrada;

        //$this->kilometraje = $most->kilometraje;
        //dd($most);

    }


    public function update(){

        $update = Autos::find($this->autos_id)->update([

            'patente' => $this->patente,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'color' => $this->color,
            'tipoDireccion' => $this->tipoDireccion,
            'tipoTraccion' => $this->tipoTraccion,
            'tipoCombustion' => $this->tipoCombustion,
            'cilindrada' => $this->cilindrada

        ]);

        return redirect()->route('autos.index')->with('Mensaje','Vehículo editado con éxito');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function captarId($id){

        //  dd($id);
        $mostDelete = Autos::find($id);
        $this->autos_id = $mostDelete->id;
  
      }

      public function eliminar(){

        $borrar = Autos::find($this->autos_id)->delete();
        return redirect()->route('autos.index')->with('Mensaje','Vehículo borrado con éxito');
        $this->dispatchBrowserEvent('close-modal');
      }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->patente = '';
        $this->marca = '';
        $this->modelo = '';
        $this->ano = '';
        $this->color = '';
        $this->tipoDireccion = '';
        $this->tipoTraccion = '';
        $this->tipoCombustion = '';
        $this->cilindrada = '';
    }



}
