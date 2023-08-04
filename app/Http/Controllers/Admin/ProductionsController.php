<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CheckList;
use App\Models\Production;

class ProductionsController extends Controller
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


    public function produccion($id){

        return view('admin.production.edit',compact('id'));
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
    public function edit($id)
    {
        //
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

       // dd($request->all());

        $idCheck = $request->check_lists_id;


        $checkList =  CheckList::find($idCheck);

        $production = Production::where('check_lists_id',$checkList->id)->get();


        foreach ($request->workers as $key => $value) { // as key for one each

           // $totalRendimiento = $request->rendimiento[$key] + $request->tiempo[$key];

           /*

            if($totalRendimiento > 9){
                $extra = $totalRendimiento - 9;
            }
            else {
                $extra = 0;
            }

            */

            $produccion = array( // new array

                "workers_id" => $request->workers[$key],
                "check_lists_id" => $checkList->id,
                "cantidad" => $request->produccion[$key],   // array[2]
                "rendimiento" => $request->rendimiento[$key], // array[3]
          
            
         
            

            );

            // en vez de ocupar el ID o [$key] se utiliza la variable array de $request->workers iniciando en el $key
            // $key inicia en 0 y el array tambien por lo que obtendremos el primer dato del array

            // Actualiza
            $productionUpdate = Production::where('check_lists_id', $checkList->id)->where('workers_id', $request->workers[$key])->update($produccion);

        


        }

        return redirect()->route('check.show',$checkList->id);
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
