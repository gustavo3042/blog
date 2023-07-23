<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use DB;
use Illuminate\Support\Facades\Storage;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.workers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $afp = DB::table('afps')->pluck('name','id');
        $contrat_id = DB::table('tipo_contratos')->pluck('name','id');
       // dd($afp);
        return view('admin.workers.create',compact('afp','contrat_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   

    public function store(Request $request)
    {
    
        //$this->valida_rut($request->rut);
       // dd($request->rut);

      // dd($request->all());

       $rut = preg_replace('/[^k0-9]/i', '', $request->rut);
       $dv  = substr($rut, -1);
       $numero = substr($rut, 0, strlen($rut)-1);
       $i = 2;
       $suma = 0;
       foreach(array_reverse(str_split($numero)) as $v)
       {
           if($i==8)
               $i = 2;
   
           $suma += $v * $i;
           ++$i;
       }
   
       $dvr = 11 - ($suma % 11);
       
       if($dvr == 11)
           $dvr = 0;
       if($dvr == 10)
           $dvr = 'K';
   
       if($dvr == strtoupper($dv)){
            
       $worker = Worker::create([

        'name'=> $request->name,
        'name2' => $request->name2,
        'surname' => $request->surname,
        'surname2' => $request->surname2,
        'rut' => $request->rut,
        'birthDate' => $request->birthDate,
        'sex' => $request->sex,
        'status' => 1,
        'address' => $request->address,
        'phone' => $request->phone,
        'Afp' => $request->afp,
        'email' => $request->email,
        'tipoContrato' => $request->tipoContrato,
        'suspensionContrato' => $request->suspensionContrato,
        'finiquito' => $request->finiquito,
        'causalFinContrato' => $request->causalFinContrato,

    ]);

    if ($request->file('photo')) { 

        
        $url = Storage::put('workers', $request->file('photo'));  
     
        $worker->image()->create([
 
          'url'=> $url
 
        ]);
      }

        return redirect()->route('workers.index')->with('Mensaje','Trabajador creado con éxito');

    }else
           return redirect()->route('workers.create')->with('Mensaje','Rut es incorrecto');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        $afp = DB::table('afps')->pluck('name','id');
        $contrat_id = DB::table('tipo_contratos')->pluck('name','id');
        return view('admin.workers.edit',compact('afp','contrat_id','worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     function valida_rut($rut)
     {
         $rut = preg_replace('/[^k0-9]/i', '', $rut);
         $dv  = substr($rut, -1);
         $numero = substr($rut, 0, strlen($rut)-1);
         $i = 2;
         $suma = 0;
         foreach(array_reverse(str_split($numero)) as $v)
         {
             if($i==8)
                 $i = 2;
     
             $suma += $v * $i;
             ++$i;
         }
     
         $dvr = 11 - ($suma % 11);
         
         if($dvr == 11)
             $dvr = 0;
         if($dvr == 10)
             $dvr = 'K';
     
         if($dvr == strtoupper($dv))
             return true;
         else
             return false;
     }

    public function update(Request $request,Worker $worker)
    {   

        if ($this->valida_rut($request->rut)) {
            
            $worker->update($request->all());


        
if ($request->file('photo')) {

    $url =  Storage::put('workers',$request->file('photo')); 
    

    
    if ($worker->image) { 
    
      Storage::delete($worker->image->url); 
    
    $worker->image->update([  
    
    'url' => $url
    
    ]);
    
    
    }else{
    
      $worker->image()->create([ 
    
    'url'=>$url
    
      ]);
    }
    
    }


            return redirect()->route('workers.index')->with('Mensaje','Trabajador actualizado con éxito');

        }else{

            return redirect()->route('workers.edit',$worker->id)->with('Mensaje','Rut es incorrecto');

        }

      //  
    }


    public function enable($worker){

        $status = Worker::where('id',$worker)->update([

            'status' => 1,

        ]);

        return redirect()->route('workers.index')->with('Mensaje','Trabajador deshabilitado con éxito');
    }


    public function disabled($worker){

       // dd($worker);
        $status = Worker::where('id',$worker)->update([

            'status' => 0,

        ]);

        return redirect()->route('workers.index')->with('Mensaje','Trabajador deshabilitado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('Mensaje','Eliminado con éxito');

    }
}
