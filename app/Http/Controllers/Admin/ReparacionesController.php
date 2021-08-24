<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparaciones;

class ReparacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reparaciones = Reparaciones::all();

        return view('admin.reparaciones.index',compact('reparaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reparaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Reparaciones $reparacione)
    {

      $request->validate([

'name' => 'required|string|min:10|max:120|unique:Reparaciones',
'Precio' => 'required',

      ]);


    $reparacione=  Reparaciones::create($request->all());

      return redirect()->route('reparar.index',compact('reparacione'));


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
    public function edit(Reparaciones $reparacione)
    {
        return view('admin.reparaciones.edit',compact('reparacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Reparaciones $reparacione)
    {


        $request->validate([

          'name' => 'required|string|min:10|max:120|unique:Reparaciones',
          'Precio' => 'required',
        ]);

    $reparar = $reparacione->update($request->all());

        return redirect()->route('reparar.index',compact('reparar'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(reparaciones $reparacione)
    {


        $reparacione->delete();

        return redirect()->route('reparar.index');


    }
}
