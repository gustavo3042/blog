<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;
use Illuminate\Support\Facades\DB;
use App\Models\Reparaciones;
use App\Models\User;
use App\Models\Cliente;
use Livewire\withPagination;
use Illuminate\Http\Request;
use App\Models\Kilometraje;

class CheckCreate extends Component
{


    use withPagination;

    protected $paginationTheme= "bootstrap";
  
    public $patente;
  
    public function updatingSearch(){
  
  $this->resetPage();
  
    }

    

    public function render()
    {

        $patentes = DB::table('check_lists')->get();

        $reparaciones = Reparaciones::all();
        $cliente = Cliente::all();
  
        $user = User::all();
  
        $tipoDireccion = [
  
          'Mecanica' => 'Mecanica',
          'Hidraulica' => 'Hidraulica',
          'Electrica' => 'Electrica'
  
        ];
  
  
        $tipoTraccion = [
  
          '2x4' => '2x4',
          '4x4' => '4x4',
        
  
        ];
  
  
        $tipoCombustion = [
  
          'Gasolina' => 'Gasolina',
          'Diesel' => 'Diesel',
          'Gas' => 'Gas'
        
  
        ];
  

      //  dd($this->patente);



      
          
         // $datos = CheckList::where('patente','LIKE','%'.$this->patente.'%')->first();



          /*
          $datos = CheckList::where('user_id','=', auth()->user()->id)
          ->where('patente','LIKE','%'.$this->patente.'%')
          ->latest('id')
          ->first();

          */

       
            
          
        
            

              
              $most = CheckList::join('check_lists_clientes','check_lists_clientes.check_lists_id','=','check_lists.id')
              ->join('clientes','clientes.id','=','check_lists_clientes.clientes_id')
              ->join('autos','autos.check_lists_id','=','check_lists.id')
              ->join('kilometrajes','kilometrajes.autos_id','=','autos.id')
              ->where('patente',$this->patente)
          
              ->select('check_lists.id as id','clientes.nombre as nombre','clientes.direccion as direccion','clientes.telefono as telefono','clientes.correo as  correo',
              'check_lists.fecha as  fecha','autos.tipoDireccion as tipoDireccion','autos.cilindrada as cilindrada','autos.marca as marca','autos.modelo as modelo',
              'autos.ano as ano','autos.color as color','autos.id as autos_id','kilometrajes.kilometraje as  kilometraje','kilometrajes.id as km_id')
             // ->latest('id')
              ->orderBy('kilometrajes.id','desc')
              ->first();

             // dd($most);

          //    $km = Kilometraje::where('autos_id',$most->autos_id)->latest('id')->first();


              return view('livewire.admin.check-create',compact('reparaciones','cliente','tipoDireccion','tipoTraccion','tipoCombustion','user','patentes','most'));

            




           

            

        

       

          

          

         

        //  dd($most->autos_id);
          

        

      
    }
}
