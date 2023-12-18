<?php

namespace App\Http\Livewire\Admin\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Clientes extends Component
{
    public $clientes;
    public $nombre;
    public $direccion;
    public $telefono;
    public $correo;
    public $cliente_id;


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

        $this->clientes = Cliente::all();

        return view('livewire.admin.clientes.clientes',['clientes' => $this->clientes ?? [],]);
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
