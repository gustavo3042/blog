<?php

namespace App\Http\Livewire\Admin\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class ClientesCreate extends Component
{

    public $nombre;
    public $direccion;
    public $telefono;
    public $correo;

    protected $validationAttributes   = [
        'nombre' => 'Nombre',
        'direccion' => 'Direccion',
        'telefono' => 'Telefono',
        'correo' => 'Correo'
       
      ];
    
      protected $rules = [
        'nombre' => 'required|string|max:120',
        'direccion' => 'required|string|max:120',
        'telefono' => 'required||integer',
        'correo' => 'required|email',
      
  
      ];
  
  
  
      protected $messages = [
          '*.required' => 'El campo :attribute es requerido',
          '*.integer' => 'El campo :attribute debe ser Numerico',
          '*.email' => 'El campo :attribute debe ser un Email',
    
      ];


      public function updated($propertyName)
      {
          $this->validateOnly($propertyName);
      }

    public function render()
    {
        return view('livewire.admin.clientes.clientes-create');
    }


    public function crearCliente(){


        $this->validate();

        try {


            $create = Cliente::create([

                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'check_lists_id' => null

            ]);

            return redirect()->route('clientes.create')->with('Mensaje','Cliente creado con éxito');
            
        } catch (\Throwable $th) {
            
            return redirect()->route('clientes.create')->with('Mensaje2','Error el cliente no se pudo crear');
        }

      //  dd($this->nombre,$this->direccion,$this->telefono,$this->correo);


    }

}