<?php

namespace App\Http\Livewire\Admin\Production;

use Livewire\Component;
use App\Models\Production;
use App\Models\CheckList;
use DB;

class Produccion extends Component
{

    public function mount($id){

        $this->production_id = $id;

        $this->production = Production::find($id);

        $this->checkList =  CheckList::find($id);
 
     //   $presupuesto = DB::table('presupuestos')->where('check_lists_id',$checkList->id)->first();
 
       // $presupuestoDetails = DB::table('presupuesto_details')->where('presupuestos_id',$presupuesto->id)->get();
 
        
        $this->workersId = DB::select(
         DB::raw("
 
         Select
 
         check_lists_workers.id as check_lists_workers_id,
 
         workers.name as name,
         workers.surname,
         workers.surname2,
         workers.id as id,
         productions.cantidad,
         productions.rendimiento,
         productions.pagodiario,
         productions.porcentaje,
         productions.pagoporcentaje,
      
         assistances.presente
      
 
     
 
       from check_lists_workers
         join workers on check_lists_workers.workers_id = workers.id
         left join productions on productions.workers_id = check_lists_workers.id
         left join assistances on assistances.workers_id = check_lists_workers.id
 
 
         where check_lists_workers.check_lists_id = ". $this->production_id ."
 
         ")
     );


   


    // dd($workersId);

    // return view('admin.production.edit',compact('checkList','workersId','production','presupuestoDetails'));
      
    }


    public function render()
    {
        return view('livewire.admin.production.produccion');
    }
}
