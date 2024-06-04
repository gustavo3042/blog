<?php

namespace App\Http\Livewire\Admin\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination; 

class Clientes extends Component
{

    use WithPagination;

    public $search;
   
    public $nombre;
    public $direccion;
    public $telefono;
    public $correo;
    public $cliente_id;

    protected $paginationTheme = "bootstrap";



    public function updatingSearch(){
      $this->resetPage();
    }


    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:120',
            'direccion' => 'required|string|max:120',
            'telefono' => 'required||integer',
            'correo' => 'required|email',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {

        $clientes = Cliente::where('nombre','LIKE','%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.clientes.clientes',compact('clientes'));
    }


    public function editar($id){

        $most = Cliente::find($id);

        if ($most) {
            
            $this->nombre = $most->nombre;
            $this->direccion = $most->direccion;
            $this->telefono = $most->telefono;
            $this->correo = $most->correo;
            $this->cliente_id = $most->id;

        }

      //  dd($most);
    

    }


    public function actualizarCliente(){

        //dd($this->cliente_id);

        $this->validate();

        try {

            $update = Cliente::find($this->cliente_id)->update([

                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'check_lists_id' => null
            ]);

            return redirect()->route('clientes.index')->with('Mensaje','Cliente editado con éxito');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');

        } catch (\Throwable $th) {
            
            return redirect()->route('clientes.create')->with('Mensaje2','Error el cliente no se pudo crear');
        }

    }

    public function captarId($id){

        //  dd($id);
        $mostDelete = Cliente::find($id);
        $this->cliente_id = $mostDelete->id;
  
      }

      public function eliminar(){

        $borrar = Cliente::find($this->cliente_id)->delete();
        return redirect()->route('clientes.index')->with('Mensaje','Cliente borrado con éxito');
        $this->dispatchBrowserEvent('close-modal');
      }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nombre = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->correo = '';
    }

    /*

    $this->resetInput();
    $this->dispatchBrowserEvent('close-modal');

    */
}
