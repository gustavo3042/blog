<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\CheckList;
use DB;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function edit($id)
    {

       
        
       
        return view('admin.assistences.edit',compact('id'));
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
        //dd($id);

        $checkList = CheckList::find($request->check_lists_id);

        $asistence = Assistance::where('check_lists_id', $checkList->id)->get();


        foreach ($request->workers as $key => $value) { // as key for one each

            $assistencia = array( // new array
                "check_lists_id" => $checkList->id,
                "workers_id" => $request->workers[$key],
             
                "presente" => $request->presente[$key][0],   // array[2]
                "inasistencia_id" => $request->inasistencia_id[$key], // array[3]

            );



            // en vez de ocupar el ID o [$key] se utiliza la variable array de $request->workers iniciando en el $key
            // $key inicia en 0 y el array tambien por lo que obtendremos el primer dato del array

            // Actualiza
            $assistenciaUpdate = Assistance::
            where('check_lists_id', $checkList->id)
            ->where('workers_id', $request->workers[$key])
            ->first();

            if($assistenciaUpdate == null){
                $create = Assistance::create($assistencia);
            }else{
                $assistenciaUpdate->update($assistencia);
            }


        }

        return redirect()->route('check.show', $checkList->id)
        ->with('Mensaje', 'Asistencia creada con éxito.');
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
