<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparaciones;
use App\Models\CheckList;
use App\Models\Cliente;

use App\Http\Requests\Check\StoreRequest;

use Illuminate\Support\Facades\Storage;

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

      return view('admin.check.create',compact('reparaciones','cliente'));
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

Cliente::insert([

  'nombre' =>$request->nombre,
  'direccion' =>$request->direccion,
  'telefono' =>$request->telefono,
  'correo' =>$request->correo

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
    public function edit(CheckList $check)
    {

      $reparaciones = Reparaciones::all();
  $cliente = Cliente::all();




      return view('admin.check.edit',compact('check','reparaciones','cliente'));

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


      

      $check->clientes()->create([

        'nombre' =>$request->nombre,
        'direccion' =>$request->direccion,
        'telefono' =>$request->telefono,
        'correo' =>$request->correo

      ]);

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
}
