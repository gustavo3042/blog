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
use App\Models\Assistance;
use Carbon\Carbon;

class CheckShow extends Component
{

   
    public $email;
    
    public $job;
    public $jobNew = [];
    public $faenasWorkers = [];
    public $faenasWorkers2 = [];
  
    public $mostFinal;

 
  
    public $idWorker;
    public $name;
    public $surname;
    public $rut;
    public $trabajo = [];

    public $workers;
    public $jobs;

    public $check;
    public $workersActive;
    public $workExist;
    public $details;
    public $detailsCompare;

    public $updateMode;

    public $allAsistencias;
    public $allLicencias;
    public $allPrecioTotal;
    public $allJobs;
    public $allGanancias;
    public $detailsRepuestos;

   // public $precio;
   // public $porcent;


 

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

        $this->workersActive = DB::table('assistances')->where('check_lists_id',$this->check)->get();

        $this->workExist = DB::table('assistances')->where(['check_lists_id' => $this->check, 'presente' => 1])->sum('presente');

        $allAsistencias = Assistance::where(['check_lists_id'=>$check,'presente'=>0])->get();
        $this->allAsistencias =  count($allAsistencias);


        $allLicencias = Assistance::where(['check_lists_id'=>$check,'presente'=>0,'inasistencia_id'=>3])->get();
        $this->allLicencias =  count($allLicencias);


        $this->allPrecioTotal = Presupuesto::where('check_lists_id',$check)->first();

        $this->allJobs = Job::where('check_lists_id',$check)->sum('pagoporcentaje');

        $this->allGanancias = $this->allPrecioTotal->total - $this->allJobs;
      //  dd($this->allJobs);
        //$this->allPrecioTotal =  count($allPrecioTotal);

        //dd($this->allAsistencias);
      
      //  $this->jobs = Job::all();


    

    }


    public function render()
    {

     //  dd($this->check);

        $a = CheckList::find($this->check);
      //  $a = Autos::where('check_lists_id',$this->check)->with('check_lists')->get();

       // dd($a);

        $reparaciones = DB::table('check_lists')
        ->join('check_list_reparaciones','check_list_reparaciones.check_list_id','=','check_lists.id')
        ->join('reparaciones','reparaciones.id','=','check_list_reparaciones.reparaciones_id')
        ->select('name')
        ->where('check_lists.id',$this->check)
        ->get();
  
  
        $clientes = DB::table('check_lists')
        ->join('check_lists_clientes','check_lists_clientes.check_lists_id','=','check_lists.id')
        ->join('clientes','clientes.id','=','check_lists_clientes.clientes_id')
        
        ->where('check_lists_clientes.check_lists_id',$this->check)
        ->first();
  
  
      /*   $autos = DB::table('check_lists')
        ->join('check_lists_autos','check_lists_autos.check_lists_id','=','check_lists.id')
        ->join('autos','autos.id','=','check_lists_autos.autos_id')
        ->where('check_lists_autos.check_lists_id',$this->check)
        ->first(); */

        $autos = Autos::where('patente',$a->patente)->first();

  
        $id = $this->check;
        $checks = CheckList::where('id',$this->check)->first();

       
        
        
         //dd($checks);
  
         /*
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

        */

        $workers = $this->workers;

        $choreWorkers = DB::select(
            DB::raw("
                Select
                workers.id as id,
                workers.rut as rut,
                workers.name as name,
                workers.surname,
                workers.surname2,
    
                productions.cantidad,
                productions.rendimiento,
                productions.pagodiario,
                productions.porcentaje,
                productions.pagoporcentaje,
              
                assistances.presente,
                check_lists_workers.id as workersCheck_id
        

              
    
                from check_lists_workers
                join workers on check_lists_workers.workers_id = workers.id
                left join productions on productions.workers_id = check_lists_workers.id
                left join assistances on assistances.workers_id = check_lists_workers.id
    
                where check_lists_workers.check_lists_id = ".$this->check."
               
            ")
        );

        //dd($choreWorkers);

        $presupuestos = DB::table('presupuestos')->where('check_lists_id',$this->check)->first();
        $this->details = DB::table('presupuesto_details')->where('presupuestos_id',$presupuestos->id)->get();
        $this->detailsCompare = DB::table('jobs')->get();

        $this->detailsRepuestos = PresupuestoDetails::where('presupuestos_id',$presupuestos->id)->sum('totalRepuestos');
        //dd($this->detailsRepuestos);

       // dd($jobs);

       //dd($choreWorkers);
        return view('livewire.admin.check-show',compact('checks','reparaciones','clientes','autos','workers','choreWorkers'));
    }


public function asistencia(){

    return view('livewire.admin.assistence');

}

public function porcentajes($id){

//dd($id,$this->check);

//$worker = Worker::find($id);
    $worker = DB::table('check_lists_workers')->where(['check_lists_id'=>$this->check,'workers_id'=>$id])->first();

    //dd($worker);
    $workerDate = Worker::find($id);

    $this->idWorker = $worker->id;
    $this->name = $workerDate->name;
    $this->surname = $workerDate->surname;
    $this->rut = $workerDate->rut;
    
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
         

            WHERE check_lists_workers.check_lists_id = '".$this->check."' AND workers.id = '".$workerDate->id ."'
         
            
            ")
    );

    //dd($this->faenasWorkers);
   // $this->faenasWorkers  = $faenas;
   




}


public function porcentajesMost($id){

   // dd($id);
    $worker = DB::table('check_lists_workers')->where(['check_lists_id'=>$this->check,'workers_id'=>$id])->first();
    $workerDate = Worker::find($id);
    
    
        $this->idWorker = $worker->id;
        $this->name = $workerDate->name;
        $this->surname = $workerDate->surname;
        $this->rut = $workerDate->rut;

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
            
    
                WHERE jobs.check_lists_id = '".$this->check."' AND jobs.workers_id = '". $this->idWorker  ."'
            
             
                
                ")
        );
    
        $this->mostFinal = Job::where(['check_lists_id' => $this->check,'workers_id'=>$this->idWorker])->sum('pagoporcentaje');

      //  dd($this->faenasWorkers2);
       // $this->faenasWorkers  = $faenas;
      // dd($most);
       
    }


public function editPorcentaje(Request $request){

    //dd($request->all());

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





    return redirect()->back();

}



public function statusFaenas(Request $request,$check){

    //dd($request->all(),$check);

    $now = Carbon::now();
   
    $todayFormatted = $now->toDateString();
    

    if (isset($request->finalizar)) {

        $change = CheckList::find($check)->update([

            'statusNow' => $request->finalizar,
            'fechaTermino' =>  $todayFormatted 
    
        ]);

      
    
    }elseif($request->continuar){


        $change = CheckList::find($check)->update([

            'statusNow' => $request->continuar
    
        ]);

       
    }


    

    return redirect()->route('check.show',$check);

}

public function deletesPorcentajes($id){

   // dd($id);

   $mostNew = DB::table('check_lists_workers')->where('id',$id)->first();

   $this->idWorker = $mostNew->id;

  // dd($mostNew);

 //  $delete = DB::table('check_lists_workers')->where('id',$id)->delete();

   //return redirect()->back();
    
    }

    public function destroyProduction(){

       // $mostCheck = DB::table('check_lists_workers')->where('workers_id',$this->idWorker)->first();
        $delete = DB::table('check_lists_workers')->where('id',$this->idWorker)->delete();
      //  return redirect()->back()->with('Mensaje','Producción eliminada con éxito');

        return redirect()->route('check.show',$this->check)->with('Mensaje','Producción eliminada con éxito');
    }

public function refresh(){

  //  dd('holis');

  $this->resetInputFields();

    return redirect()->back();
    
}





/*

Funciones 

public function edit ($worker_id){

    
       

      $most = Worker::find($worker_id);

      $worker = DB::table('check_lists_workers')->where(['check_lists_id'=>$this->check,'workers_id' => $most->id])->first();
    //  dd($worker);

     // $this->jobNew = Job::where('workers_id',$worker_id)->get();

     // dd($this->jobNew);

      $this->rut = $most->rut;
      $this->name = $most->name;
      $this->surname = $most->surname;
      $this->email = $most->email;
      $this->idWorker = $most->id;
  

    
  
  }


  public function changeEdit($worker_id){

  //dd($worker_id);

    $most = Worker::find($worker_id);

    $worker = DB::table('check_lists_workers')->where(['check_lists_id'=>$this->check,'workers_id' => $most->id])->first();
  //  dd($worker);

     $this->jobNew = Job::where('workers_id',$worker_id)->get();

   // dd($this->jobNew);

    $this->rut = $most->rut;
    $this->name = $most->name;
    $this->surname = $most->surname;
    $this->email = $most->email;
    $this->idWorker = $most->id;

  }


  public function change(Request $request){

  //  dd($request->all());


    $faena = $request->check;

    $mostFaena = CheckList::find($faena);

   // dd($mostFaena);

    $sum = count($request->job);

    $editCantidad =  Production::where(['check_lists_id'=> $request->check, 'workers_id'=> $request->idWorker])->update(['cantidad' => $sum]);
     
  
      if (count($request->idWorker) > 0) {
          # code...
      
        
      foreach ($request->idWorker as $index => $value) {
  
          $most = array(
  
              'check_lists_id' => $request->check,
              'workers_id' => $request->idWorker[$index],
              'presupuesto_details_id' => $request->job[$index],
              'trabajos' => $request->trabajos[$index],
  
          );
    
  
          $productionUpdate = Job::where(['check_lists_id'=> $mostFaena->id, 'workers_id' =>$request->idWorker[$index]])->update($most);
  
      }
  
      }
  
     // dd($sum);
  
      return redirect()->route('check.show',$request->check);

  }

  public function update(Request $request){

  // dd($request->all(),count($request->job));

    //dd($request->check);



   // dd(count($request->job));

   $sum = count($request->job);

  $editCantidad =  Production::where(['check_lists_id'=> $request->check, 'workers_id'=> $request->idWorker])->update(['cantidad' => $sum]);
   

    if (count($request->job) > 0) {
        # code...
    
      
    foreach ($request->job as $index => $value) {

        $most = array(

            'check_lists_id' => $request->check,
            'workers_id' => $request->idWorker,
            'presupuesto_details_id' => $request->job[$index],
            'trabajos' => $request->trabajos[$index],

        );
  

        Job::insert($most);
        

    }

    }

   // dd($sum);

    return redirect()->route('check.show',$request->check);

  }


*/

private function resetInputFields(){
    $this->rut = '';
    $this->name = '';
    $this->email = '';
    $this->jobs = '';
    $this->trabajo= '';
}



   
public function cancel()
{
    $this->updateMode = false;
    $this->resetInputFields();


}


}
