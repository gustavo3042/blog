<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Reparaciones;
use App\Models\CheckList;
use App\Models\Cliente;
use App\Models\Autos;
use App\Models\User;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;
use Illuminate\Http\Request;

class CheckShow extends Component
{

   

    public function mount($check){

        $this->check = $check;

        $id = $this->check;
  
        $this->workers = DB::table('workers')
  
        ->where('status',1)
        ->whereNotIn('id', function ($g) use ($id) {
            $g->select('workers_id')
                ->from('check_lists_workers')
              
  
                    ->whereIn('check_lists_id', function ($p) use ($id) {
                        $p->select('id')
                            ->from('check_lists')
                            ->where('id', $id)
                            ->get();
                    });
        })->get();
    }

    // return view('admin.check.show',compact('check','reparaciones','clientes','autos','workers'));
    public function render()
    {


        $reparaciones = DB::table('check_lists')
        ->join('check_list_reparaciones','check_list_reparaciones.check_list_id','=','check_lists.id')
        ->join('reparaciones','reparaciones.id','=','check_list_reparaciones.reparaciones_id')
        ->select('name')
        ->where('check_lists.id',$this->check)
        ->get();
  
  
        $clientes = DB::table('check_lists')
        ->join('clientes','clientes.check_lists_id','=','check_lists.id')
        ->where('clientes.check_lists_id',$this->check)
        ->first();
  
  
        $autos = DB::table('check_lists')
        ->join('autos','autos.check_lists_id','=','check_lists.id')
        ->where('autos.check_lists_id',$this->check)
        ->first();
  
        $id = $this->check;
        $checks = CheckList::where('id',$this->check)->first();
         //dd($checks);
  
        $workers = DB::table('workers')
  
        ->where('status',1)
        ->whereNotIn('id', function ($g) use ($id) {
            $g->select('workers_id')
                ->from('check_lists_workers')
              
  
                    ->whereIn('check_lists_id', function ($p) use ($id) {
                        $p->select('id')
                            ->from('check_lists')
                            ->where('id', $id)
                            ->get();
                    });
        })->get();

        return view('livewire.admin.check-show',compact('checks','reparaciones','clientes','autos','workers'));
    }


public function asistencia(){

    dd('holios');

}
   

}
