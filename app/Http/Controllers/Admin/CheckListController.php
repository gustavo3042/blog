<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparaciones;
use App\Models\CheckList;
use App\Models\Cliente;
use App\Models\Autos;

use App\Http\Requests\Check\StoreRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $reparaciones = Reparaciones::all();
      $cliente = Cliente::all();

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




      return view('admin.check.create',compact('reparaciones','cliente','tipoDireccion','tipoTraccion','tipoCombustion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {


  $check =    CheckList::create($request->all());

 // return dd($check->id);

 $checkA = $check->id;

Cliente::insert([

  'nombre' =>$request->nombre,
  'direccion' =>$request->direccion,
  'telefono' =>$request->telefono,
  'correo' =>$request->correo,
  'check_lists_id' => $check->id

]);

Autos::insert([

'marca'=> $request->marca,
'modelo'=> $request->modelo,
'ano'=> $request->ano,
'color'=> $request->color,
'check_lists_id' => $checkA,
'tipoDireccion' => $request->tipoDireccion,
'tipoTraccion' => $request->tipoTraccion,
'tipoCombustion' =>$request->combustion,
'cilindrada' => $request->cilindrada,

]);



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







      return view('admin.check.edit',compact('check','reparaciones','clientes','autos','tipoDireccion','tipoTraccion','tipoCombustion'));

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


     // return dd($check->id);


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
