<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\Cliente;
use App\Models\Reparaciones;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    return view('admin.orden.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {





    return view('admin.orden.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(OrdenServicio $orden)
    {



  //$clientes = Cliente::where('id','=','cliente_id')->get();


  $clientes = DB::table('orden_servicios')
  ->join('clientes','clientes.id','=' ,'orden_servicios.cliente_id')
  ->select('clientes.nombre','clientes.direccion','clientes.telefono','clientes.correo')
  ->where('clientes.id',$orden->cliente_id)
  ->first();



      return view('admin.orden.edit',compact('orden','clientes'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
