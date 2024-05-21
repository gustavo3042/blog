<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Reparaciones;
use App\Models\CheckList;
use App\Models\Cliente;
use App\Models\Autos;
use App\Models\User;
use App\Models\Worker;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Production;

class CheckShowCreate extends Component
{

    public $faenasWorkers = [];
    public $faenasWorkers2 = [];
    public $workers;
    public $idWorker;
    public $name;
    public $surname;
    public $rut;

    public $worker_id;
    public $check_id;
    public $auto;
    public $faena;

    public function mount($id){

     

        $most = DB::table('check_lists_workers')->where('id',$id)->first();

        //dd($most);

        $this->worker_id = $most->workers_id;
        $this->check_id = $most->check_lists_id;

      //  dd($this->worker_id);

       // dd($this->worker_id,$this->check_id);

        $this->auto = Autos::join('check_lists_autos','check_lists_autos.autos_id','=','autos.id')
        ->where('check_lists_autos.check_lists_id',$this->check_id)->first();

       // dd($this->auto);

       $this->faena = CheckList::find($this->check_id);

       // $worker = DB::table('check_lists_workers')->where('id',$this->worker_id)->first();

        //dd($worker);
        $workerDate = Worker::find($this->worker_id);

        //dd($workerDate);
    
       // $this->idWorker = $this->workers_id;
        $this->name = $workerDate->name;
        $this->surname = $workerDate->surname;
        $this->rut = $workerDate->rut;

        /*
        $this->workers = $workers = DB::table('workers')
      
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
     */
    
        //dd($this->idWorker);
     
        $this->faenasWorkers  = DB::select(
    
                DB::raw("
    
                Select
         
     
    
                productions.cantidad,
                productions.rendimiento,
                productions.pagodiario,
                productions.porcentaje,
                productions.pagoporcentaje,
                presupuesto_details.trabajo,
                presupuesto_details.precio,
                presupuesto_details.id as idFaenas
           
              
             
              
    
                from check_lists_workers
                join workers on check_lists_workers.workers_id = workers.id
                left join productions on productions.workers_id = check_lists_workers.id
                left join presupuestos on presupuestos.check_lists_id = check_lists_workers.check_lists_id
                left join presupuesto_details on presupuesto_details.presupuestos_id = presupuestos.id
             
    
                WHERE check_lists_workers.check_lists_id = '".$this->check_id."' AND workers.id = '".$workerDate->id ."'
             
                
                ")
        );
    
        
    }

    public function render()
    {
        return view('livewire.admin.check-show-create');
    }


    public function update(Request $request){

           // dd($request->all());
         
             //dd($request->check);
         
         
         
            // dd(count($request->job));
         
           // $sum = count($request->job);
       
           
         
          // $editCantidad =  Production::where(['check_lists_id'=> $request->check, 'workers_id'=> $request->idWorker])->update(['cantidad' => $sum]);
            
           $totales  = 0;
           $amount = 0;
           $tot = 0;
       
             if (count($request->trabajo) > 0) {
                 # code...
             
               
             foreach ($request->trabajo as $index => $value) {
       
       
               $totales = $totales + 1;
       
               $amount += $request->porcent[$index];    
               $tot +=  $request->porcent[$index]/100 * $request->precio[$index];  
         
                 $most = array(
         
                     'check_lists_id' => $request->check,
                     'workers_id' => $request->idWorker,
                     'presupuesto_details_id' => $request->idFaenas[$index],
                     'trabajos' => $request->trabajo[$index],
                     'porcentaje' => $request->porcent[$index],
                     'pagoporcentaje' =>  $request->porcent[$index]/100 * $request->precio[$index],
                     'workingHrs' => $request->workingHrs[$index] 
         
                 );
           
         
                 Job::insert($most);
                 
         
             }
         
             }
       
             $ar = Production::where(['check_lists_id'=> $request->check, 'workers_id' => $request->idWorker])->update(['cantidad'=>$totales,'porcentaje'=>$amount,'pagoporcentaje'=> $tot]);

            /*
             if ($ar) {
            
                dd('Positivo');

             }else{

                dd('Fallo');

             }
           */  
         
            // dd($sum);
         
             return redirect()->route('check.show',$request->check);
         
           }
}
