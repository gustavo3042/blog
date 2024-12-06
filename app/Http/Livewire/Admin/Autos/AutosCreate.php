<?php

namespace App\Http\Livewire\Admin\Autos;

use Livewire\Component;
use App\Models\Autos;
use App\Models\Kilometraje;

class AutosCreate extends Component
{

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

    protected $validationAttributes   = [
        'patente' => 'Patente',
        'marca' => 'Marca',
        'modelo' => 'Modelo',
        'ano' => 'Año',
        'color' => 'Color',
        'tipoDireccion' => 'Tipo de dirección',
        'tipoTraccion' => 'Tipo de traccion',
        'tipoCombustion' => 'Tipo de combustion',
        'cilindrada' => 'Cilindrada',
        'kilometraje' => 'Kilometraje'


        
       
      ];
    
      protected $rules = [
        'patente' => 'required|string|max:7',
        'marca' => 'required|string|max:120',
        'modelo' => 'required|string|max:120',
        'ano' => 'required||integer',
        'color' => 'required|string|max:120',
        'tipoDireccion' => 'required|string|max:120',
        'tipoTraccion' => 'required|string|max:120',
        'tipoCombustion' => 'required|string|max:120',
        'cilindrada' => 'required||integer',
        'kilometraje' => 'required|integer',
        
      
  
      ];
  
  
  
      protected $messages = [
          '*.required' => 'El campo :attribute es requerido',
          '*.integer' => 'El campo :attribute debe ser Numerico',
          
    
      ];


      public function updated($propertyName)
      {
          $this->validateOnly($propertyName);
      }

    public function render()
    {
        return view('livewire.admin.autos.autos-create');
    }

    public function crearAuto(){

      //  dd($this->kilometraje);

        $this->validate();

        try {
            
            $create = Autos::create([
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


          

            Kilometraje::insert([

            
                'tipoAceite' => 5,
                'kilometraje' => $this->kilometraje,
                'newKilometraje' => 0,
                'mostkilometraje' => 0,
                'check_lists_id' => null,
                'autos_id' => $create->id


            ]);

            return redirect()->route('autos.index')->with('Mensaje','Vehículo creado con éxito');

        } catch (\Throwable $th) {

            return redirect()->route('autos.index')->with('Mensaje2','Error el vehículo no se pudo crear');
        }


    }

}
