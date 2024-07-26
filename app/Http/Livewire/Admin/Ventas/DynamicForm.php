<?php

namespace App\Http\Livewire\Admin\Ventas;

use Livewire\Component;
use App\Models\CheckList;
use Illuminate\Support\Facades\DB;
use App\Models\Reparaciones;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Insumo;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\Kilometraje;



class DynamicForm extends Component
{

   use WithPagination;

   protected $paginationTheme= "bootstrap";

   public $fields = [];
    
   public $patente;
   public $nombre;
   public $direccion;
   public $telefono;
   public $correo;
   public $fecha;
   public $tipoDireccion;
   public $tipoTraccion;
   public $tipoCombustion;
   public $cilindrada;
   public $marca;
   public $modelo;
   public $ano;
   public $color;
   public $kilometraje;

   public function updatingSearch(){
  
    $this->resetPage();
  
    }
  

     public function mount(){

    
       

       $this->fields[] = ['nombres'=>'','apellido'=>'','edad'=>''];

    }

    public function addField(){

        $this->fields[] = ['nombres'=>'','apellido'=>'','edad'=>''];



    }


     public function removeField($index){

          //  dd($this->fields[$index]);
            unset($this->fields[$index]);
            $this->fields = array_values($this->fields);

    }
  


    public function render()
    {

        $tipoD = [
  
            'Mecanica' => 'Mecanica',
            'Hidraulica' => 'Hidraulica',
            'Electrica' => 'Electrica'
    
          ];

          
        $tipoT = [
  
            '2x4' => '2x4',
            '4x4' => '4x4',
          
    
          ];

          $tipoC = [
  
            'Gasolina' => 'Gasolina',
            'Diesel' => 'Diesel',
            'Gas' => 'Gas'
          
    
          ];

        return view('livewire.admin.ventas.dynamic-form',compact('tipoD','tipoT','tipoC'));
    }


     public function updatedPatente()
    {
        $this->buscarVehiculo();
    }


    public function buscarVehiculo()
    {


        $most = CheckList::join('check_lists_clientes','check_lists_clientes.check_lists_id','=','check_lists.id')
        ->join('clientes','clientes.id','=','check_lists_clientes.clientes_id')
        ->join('autos','autos.check_lists_id','=','check_lists.id')
        ->join('kilometrajes','kilometrajes.autos_id','=','autos.id')
        ->where('check_lists.patente',$this->patente)
        ->select('check_lists.id as id','clientes.nombre as nombre','clientes.direccion as direccion',
        'clientes.telefono as telefono','clientes.correo as  correo',
        'check_lists.fecha as  fecha','autos.tipoDireccion as tipoDireccion',
        'autos.tipoTraccion as tipoTraccion','autos.cilindrada as cilindrada',
        'autos.marca as marca','autos.modelo as modelo',
        'autos.ano as ano','autos.color as color','autos.id as autos_id',
        'kilometrajes.kilometraje as  kilometraje','kilometrajes.id as km_id',
        'autos.patente')
        ->orderBy('kilometrajes.id','desc')
        ->first();

        if ($most) {

            $this->nombre = $most->nombre;
            $this->direccion = $most->direccion;
            $this->telefono = $most->telefono;
            $this->correo = $most->correo;
            $this->fecha = $most->fecha;
            $this->tipoDireccion = $most->tipoDireccion;
            $this->tipoTraccion = $most->tipoTraccion;
            $this->cilindrada = $most->cilindrada;
            $this->marca = $most->marca;
            $this->modelo = $most->modelo;
            $this->ano = $most->ano;
            $this->color = $most->color;
            $this->kilometraje = $most->kilometraje;

        }else{

            $this->nombre = '';
            $this->direccion = '';
            $this->telefono = '';
            $this->correo = '';
            $this->fecha = '';
            $this->tipoDireccion = '';
            $this->tipoTraccion = '';
            $this->cilindrada = '';
            $this->marca = '';
            $this->modelo = '';
            $this->ano = '';
            $this->color = '';
            $this->kilometraje = '';
        }


    } 

}
