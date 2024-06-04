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

class CheckShowEdit extends Component
{

    public $check;
    public $idWorker;
    public $name;
    public $surname;
    public $rut;
    public $faenasWorkers2;
    public $mostFinal;
    public $check_lists;
    public $worker_id;
    public $workers_id;

    public function mount($id){

       

       $most = DB::table('check_lists_workers')->where('id',$id)->first();

      // dd($most);
      $this->workers_id = $id;
       $this->worker_id = $most->workers_id;
       $this->check   = $most->check_lists_id;



       

       // $worker = DB::table('check_lists_workers')->where('id',$this->worker_id)->first();
       // dd($worker,$this->worker_id);
        $workerDate = Worker::find($this->worker_id);
      

        $this->check_lists = CheckList::find($this->check);
        
        
           // $this->idWorker = $worker->id;
            $this->name = $workerDate->name;
            $this->surname = $workerDate->surname;
            $this->rut = $workerDate->rut;
    
           
         
            $this->faenasWorkers2  = DB::select(
        
                    DB::raw("
        
                    Select
             
         
        
                
                    presupuesto_details.trabajo,
                    presupuesto_details.precio,
                    presupuesto_details.id as idFaenas,
                    jobs.porcentaje as totalPorcentaje,
                    jobs.pagoporcentaje as amountPorcentaje,
                    jobs.id as jobs_id
               
                  
                 
                  
        
                    from jobs
                
                    left join presupuesto_details on presupuesto_details.id = jobs.presupuesto_details_id
                
        
                    WHERE jobs.check_lists_id = '".$this->check."' AND jobs.workers_id = '". $id ."'
                
                 
                    
                    ")
            );
        
            $this->mostFinal = Job::where('workers_id',$this->worker_id)->sum('pagoporcentaje');
    
          // dd($this->faenasWorkers2);
           // $this->faenasWorkers  = $faenas;
          // dd($most);
           
    }

    public function render()
    {
        return view('livewire.admin.check-show-edit');
    }



    public function editPorcentaje(Request $request){

       // dd($request->all());
    
      //  dd($this->trabajo);
    
      
    
      $jobsNew = Job::where(['check_lists_id'=> $request->check, 'workers_id'=> $request->idWorker])->get();
      
    //  dd($jobsNew,$request->all());
      //dd();
    
    
        
        $totales  = 0;
        $amount = 0;
        $tot = 0;
    
    
     
        
    
            
    
        
        
        foreach ($request->jobsId as $key => $items) {
    
            
            
            $totales = $totales + 1;
    
            $amount += $request->porcent[$key];    
            $tot +=  $request->porcent[$key]/100 * $request->precio[$key];  
    
         
            $jobsId['id'] = $request->jobsId[$key];
            $jobsId['porcentaje'] = $request->porcent[$key];
            $jobsId['pagoporcentaje'] = $request->porcent[$key]/100 * $request->precio[$key];  
    
     
    
            Job::where('id',$request->jobsId[$key])->update($jobsId);
                
            
    
    
    
        }
    
    
    
    
      $ar = Production::where(['check_lists_id'=> $request->check, 'workers_id' => $request->idWorker])->update(['cantidad'=>$totales,'porcentaje'=>$amount,'pagoporcentaje'=> $tot]);
    
      //dd($tot,$amount,$totales);
    
    
    
    
    
      return redirect()->route('check.show',$request->check);
    
    }
}
