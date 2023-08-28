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

class CheckShow extends Component
{

    public $rut;
    public $name;
    public $surname;
    public $email;
    public $idWorker;
    public $job;

    public function mount($check){

      
        $this->check = $check;
     

      //  $this->presupuesto = DB::table('presupuestos')->where('check_lists_id',$this->check)->first();

       // dd($this->presupuesto->id);
 
     //  $this->presupuestoDetails = DB::table('presupuesto_details')->where('presupuestos_id',$this->presupuesto->id)->get();

      // dd($this->presupuestoDetails);

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


      

    

    }


    public function render()
    {


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
  
  
        $autos = DB::table('check_lists')
        ->join('check_lists_autos','check_lists_autos.check_lists_id','=','check_lists.id')
        ->join('autos','autos.id','=','check_lists_autos.autos_id')
        ->where('check_lists_autos.check_lists_id',$this->check)
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
              
                assistances.presente
    
                from check_lists_workers
                join workers on check_lists_workers.workers_id = workers.id
                left join productions on productions.workers_id = check_lists_workers.id
                left join assistances on assistances.workers_id = check_lists_workers.id
    
                where check_lists_workers.check_lists_id = ".$this->check."
               
            ")
        );

        $presupuestos = DB::table('presupuestos')->where('check_lists_id',$this->check)->first();
        $this->details = DB::table('presupuesto_details')->where('presupuestos_id',$presupuestos->id)->get();

        return view('livewire.admin.check-show',compact('checks','reparaciones','clientes','autos','workers','choreWorkers'));
    }


public function asistencia(){

    return view('livewire.admin.assistence');

}

public function edit ($worker_id){

    
       

      $most = Worker::find($worker_id);

      $worker = DB::table('check_lists_workers')->where(['check_lists_id'=>$this->check,'workers_id' => $most->id])->first();
    //  dd($worker);

      $this->rut = $most->rut;
      $this->name = $most->name;
      $this->surname = $most->surname;
      $this->email = $most->email;
      $this->idWorker = $most->id;
  
    
  
  }

  public function update(Request $request){

  //  dd($request->all());

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

        );
  

        Job::insert($most);

    }

    }

   // dd($sum);

    return redirect()->route('check.show',$request->check);

  }

private function resetInputFields(){
    $this->rut = '';
    $this->name = '';
    $this->email = '';
    $this->jobs = '';
}



   
public function cancel()
{
    $this->updateMode = false;
    $this->resetInputFields();


}


}
