<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparaciones;
use App\Models\CheckList;
use App\Models\Cliente;
use App\Models\Autos;
use App\Models\User;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;
use App\Models\Kilometraje;

use App\Http\Requests\Check\StoreRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use PDF;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      return view('admin.check.index');



    }


    function action(Request $request)
    {
      return CheckList::select('patente')
      ->where('patente', 'like', "%{$request->term}%")
      ->pluck('patente');
    }

    function marca(Request $request)
    {
      return Autos::select('marca')
      ->where('marca', 'like', "%{$request->term}%")
      ->pluck('marca');
    }

    function modelo(Request $request)
    {
      return Autos::select('modelo')
      ->where('modelo', 'like', "%{$request->term}%")
      ->pluck('modelo');
    }

    function ano(Request $request)
    {
      return Autos::select('ano')
      ->where('ano', 'like', "%{$request->term}%")
      ->pluck('ano');
    }
  

    function color(Request $request)
    {
      return Autos::select('color')
      ->where('color', 'like', "%{$request->term}%")
      ->pluck('color');
    }


    function cilindros(Request $request)
    {
      return Autos::select('cilindrada')
      ->where('cilindrada', 'like', "%{$request->term}%")
      ->pluck('cilindrada');
    }

    function nombre(Request $request)
    {
      return Cliente::select('nombre')
      ->where('nombre', 'like', "%{$request->term}%")
      ->pluck('nombre');
    }

    function direccion(Request $request)
    {
      return Cliente::select('direccion')
      ->where('direccion', 'like', "%{$request->term}%")
      ->pluck('direccion');
    }

    function telefono(Request $request)
    {
      return Cliente::select('telefono')
      ->where('telefono', 'like', "%{$request->term}%")
      ->pluck('telefono');
    }


    function correo(Request $request)
    {
      return Cliente::select('correo')
      ->where('correo', 'like', "%{$request->term}%")
      ->pluck('correo');
    }

    //funcion para documento pdf boleta
    public function documentoPdf($id){

      $check = CheckList::find($id);

      $presupuesto = Presupuesto::where('check_lists_id',$check->id)->first();
      $presupuestDetails = DB::table('presupuesto_details')->where('presupuestos_id',$presupuesto->id)->get();
      
      $correo = DB::table('check_lists')
      ->join('users','users.id','=','check_lists.user_id')
      ->where('check_lists.id',$id)->first();

     // dd($correo);

    //dd($presupuestDetails);

      $pdf = PDF::loadView('admin.check.documentoPdf',compact('check','presupuesto','presupuestDetails','correo'));
      return $pdf->setPaper('Doc')->stream('Boleta servicio');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Funcion para eventual select dinamico
    public function datos($id)
    {
        $dt = DB::table('check_lists')
        ->join('autos', 'autos.check_lists_id', '=', 'check_lists.id')
        ->where('check_lists.id', $id)
        ->get();
        //$alumno = AlumnoCurso::where('curso_id', $id)->get();

        return $dt;
    }

   
    


    public function create()
    {

      /*


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


        */

      return view('admin.check.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {


     // dd($request->all());


    $check =    CheckList::create($request->all());


    $checkA = $check->id;

      $dt = new Presupuesto();
      $dt->id;
      $prom = 0;

      foreach ($request->amount as $item) {
        
        $prom += $item;
      }

      $dt->total = $prom;
      $dt->iva = ($prom * 0.19);
      $dt->subtotal = ($prom * 0.19) + $prom;
      $dt->check_lists_id =  $checkA;
      $dt->created_at = $check->fecha;
      $dt->updated_at = $check->fecha;
      $dt->save();


      

      if (count($request->product_name) > 0) {


        
        
        foreach ($request->product_name as $key => $value) {
        

          $data = array(

            'trabajo' => $request->product_name[$key],
            'descripcion' => $request->brand[$key],
            'cantidad' => $request->quantity[$key],
            'precio'=> $request->budget[$key],
            'amount' => $request->amount[$key],
            'presupuestos_id' => $dt->id

          );

        

          PresupuestoDetails::insert($data);

        }


      }


      $checkClient = CheckList::where('patente',$request->patente)->first();

     // dd($checkClient);

      $clientNew = Cliente::where('check_lists_id',$checkClient->id)->first();

    // dd($clientNew);

    if (empty($clientNew->check_lists_id)) {

      Cliente::insert([

        'nombre' =>$request->nombre,
        'direccion' =>$request->direccion,
        'telefono' =>$request->telefono,
        'correo' =>$request->correo,
        'check_lists_id' => $check->id

      ]);
    
    }



    $checkAuto = CheckList::where('patente',$request->patente)->first();

    // dd($checkClient);

     $autoNew = Autos::where('check_lists_id',$checkAuto->id)->first();


    // dd($autoNew);


     if (empty($autoNew->check_lists_id)) {
      


        $autosL= new Autos();
        $autosL->marca = $request->marca;
        $autosL->modelo = $request->modelo;
        $autosL->ano = $request->ano;
        $autosL->color = $request->color;
        $autosL->check_lists_id = $checkA;
        $autosL->tipoDireccion = $request->tipoDireccion;
        $autosL->tipoTraccion = $request->tipoTraccion;
        $autosL->tipoCombustion = $request->combustion;
        $autosL->cilindrada = $request->cilindrada;
        $autosL->save();

        


        Kilometraje::insert([

          'tipoAceite'=>$request->tipoAceite,
          'kilometraje'=> $request->kilometraje,
          'newKilometraje'=> 0,
          'autos_id'=> $autosL->id

        ]);






     }else{


   //   dd($request->patente);

      $checkAuto2 = CheckList::where('patente',$request->patente)->first();

   //  dd($checkAuto2);
  
       $autoNew2 = Autos::where('check_lists_id',$checkAuto2->id)->first();


      $kmCar = Kilometraje::where('autos_id',$autoNew2->id)->latest('id')->first();

      //dd($kmCar->autos_id);

      $kmNuevo = $request->kilometraje - $kmCar->kilometraje;

        
      Kilometraje::insert([

        'tipoAceite' => $request->tipoAceite,
        'kilometraje' => $request->kilometraje,
        'newKilometraje' => $kmNuevo,
        'autos_id' =>  $kmCar->autos_id


      ]);

      //dd($kmCar);

     }

    

     


        if ($request->file('file')) {

      $url = Storage::put('check_lists', $request->file('file'));


      $check->image()->create([

      'url' => $url

      ]);

        }



        //para subir la imagen al storage app public que es donde guardaremos la imagen tuvimos que cambiar la configuracion de el
        //archivo carpeta de configuracion config y despues en el archivo filesystems camibar el default a public = 'default' => env('FILESYSTEM_DRIVER', 'public'),


      if ($request->reparaciones) {


        $check->reparaciones()->attach($request->reparaciones);

      }




return redirect()->route('check.index',$check);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CheckList $check)
    {
      $reparaciones = DB::table('check_lists')
      ->join('check_list_reparaciones','check_list_reparaciones.check_list_id','=','check_lists.id')
      ->join('reparaciones','reparaciones.id','=','check_list_reparaciones.reparaciones_id')
      ->select('name')
      ->where('check_lists.id',$check->id)
      ->get();


      $clientes = DB::table('check_lists')
      ->join('clientes','clientes.check_lists_id','=','check_lists.id')
      ->where('clientes.check_lists_id',$check->id)
      ->get();


      $autos = DB::table('check_lists')
      ->join('autos','autos.check_lists_id','=','check_lists.id')
      ->where('autos.check_lists_id',$check->id)
      ->get();

      return view('admin.check.show',compact('check','reparaciones','clientes','autos'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckList $check)
    {

      $reparaciones = Reparaciones::all();
      $user = User::all();


      

      $presupuesto = Presupuesto::where('check_lists_id',$check->id)->first();
      $presupuestoDetails = PresupuestoDetails::where('presupuestos_id',$presupuesto->id)->get();

   // dd($presupuestoDetails);

      $clientes = DB::table('check_lists')
      ->join('clientes','clientes.check_lists_id','=' ,'check_lists.id')
      ->select('clientes.nombre','clientes.direccion','clientes.telefono','clientes.correo')
      ->where('clientes.check_lists_id',$check->id)
      ->first();


      $autos = DB::table('check_lists')
      ->join('autos','autos.check_lists_id','=' ,'check_lists.id')
      ->select('autos.marca','autos.modelo','autos.ano','autos.color','autos.cilindrada')
      ->where('autos.check_lists_id',$check->id)
      ->first();


      $tipoDireccion = Autos::select('tipoDireccion')->where('check_lists_id',$check->id)->get();
      $tipoTraccion = Autos::select('tipoTraccion')->where('check_lists_id',$check->id)->get();
      $tipoCombustion =  Autos::select('tipoCombustion')->where('check_lists_id',$check->id)->get();
      
   //   return dd($tipoDireccion);







      return view('admin.check.edit',compact('check','reparaciones','clientes','autos','tipoDireccion','tipoTraccion','tipoCombustion','user','presupuestoDetails'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request,CheckList $check)
    {
      $check->update($request->all());


   // dd($check->id);

     // dd($request->all());


     $checkA = $check->id;

     $presupuestoDelete = Presupuesto::where('check_lists_id',$checkA)->first();
     $borrarDetails = DB::table('presupuesto_details')->where('presupuestos_id',$presupuestoDelete->id)->delete();
   //  dd($presupuestoDelete->id);

   $prom = 0;
     
   foreach ($request->amount as $item) {
     
     $prom += $item;
   }
   


    $dts = DB::table('presupuestos')->where('check_lists_id',$checkA)->update(['total'=>$prom,'iva'=>($prom * 0.19) ,'subtotal'=>(($prom * 0.19) + $prom),'check_lists_id' => $checkA, 'created_at'=> $request->fecha, 'updated_at' =>$request->fecha  ]);

  
     if (count($request->product_name) > 0) {
     
     
       
       
       foreach ($request->product_name as $key => $value) {
       
     
         $data = array(
     
           'trabajo' => $request->product_name[$key],
           'descripcion' => $request->brand[$key],
           'cantidad' => $request->quantity[$key],
           'precio'=> $request->budget[$key],
           'amount' => $request->amount[$key],
           'presupuestos_id' => $presupuestoDelete->id
     
         );
     
        
     
         PresupuestoDetails::insert($data);
     
       }
     
     
     }


      $clientes = DB::table('clientes')->where('check_lists_id',$check->id)
      ->update(['nombre'=>$request->nombre,'direccion'=> $request->direccion,'telefono'=>$request->telefono,'correo'=>$request->correo]);



//return dd([$request->tipoDireccion,$request->tipoTraccion,$request->tipoCombustion,$request->cilindrada]);

      $autos = DB::table('autos')->where('check_lists_id',$check->id)
      ->update(['marca'=>$request->marca,'modelo'=> $request->modelo,'ano'=>$request->ano,'color'=>$request->color,
                'tipoDireccion'=> $request->tipoDireccion,'tipoTraccion'=> $request->tipoTraccion,'tipoCombustion'=> $request->tipoCombustion,
              'cilindrada'=> $request->cilindrada]);
   

      if ($request->file('file')) {

        $url = Storage::put('check_lists', $request->file('file'));


        if ($check->image) {

          Storage::delete($check->image->url);

          $check->image->update([


          'url' => $url

          ]);

        }else {

            $check->image()->create([

              'url' => $url

            ]);

        }

      }


if ($check->reparaciones) {


$check->reparaciones()->sync($request->reparaciones);

}



      return redirect()->route('check.index',$check)->with('Mensaje','El checklist fue actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $check)
    {

     // dd($check->id);

      

      $check->delete();

      

      return redirect()->route('check.index')->with('Mensaje','El registro se elimino con éxito');


    }



    public function presupuesto(CheckList $check){

      $reparaciones = DB::table('check_lists')
      ->join('check_list_reparaciones','check_list_reparaciones.check_list_id','=','check_lists.id')
      ->join('reparaciones','reparaciones.id','=','check_list_reparaciones.reparaciones_id')
      ->select('name')
      ->where('check_lists.id',$check->id)
      ->get();

      return view('admin.check.presupuesto',compact('check','reparaciones'));


    }

}
