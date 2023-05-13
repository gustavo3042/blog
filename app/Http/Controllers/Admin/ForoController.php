<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CheckList;
use App\Models\User;
use App\Models\Kilometraje;
use App\Models\Autos;
use App\Models\CategoryForo;
use App\Models\PostForoConsultas;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $check = DB::table('check_lists')->get();

        return view('admin.foro.index');
    }


    public function buscar(Request $request){

        $buscar = $request->buscar;  

      

        /*
        $check = DB::table('check_lists')
        ->join('clientes','clientes.check_lists_id','=','check_lists.id')
        ->join('users','users.name','=','clientes.nombre')        
        ->get();

        */

        $check1 = CheckList::where('patente','LIKE','%'.$buscar.'%')
       // ->where('users.id',auth()->user()->id)
        ->latest('id')
        ->paginate(5);

            
        $most = CheckList::join('autos','autos.check_lists_id','=','check_lists.id')
        ->join('kilometrajes','kilometrajes.autos_id','=','autos.id')
        ->where('patente',$buscar)

        ->select('kilometrajes.mostKilometraje as totalKilometros','kilometrajes.tipoAceite as tipoAceite','kilometrajes.id as idKm')
    
        ->orderBy('kilometrajes.id','desc')
        ->first();

       // dd($most);

        /*

        $autos = Autos::where('check_lists_id',$check1->id)->get();

        dd($autos);

        $km = Kilometraje::where('autos_id',$autos[0]->id)->get();

      //  dd($autos);

            */

          return view('admin.foro.buscar',compact('check1','most'));

    }



    public function consultas(){


        $postsForo = PostForoConsultas::all();


        return view('admin.foro.foroConsultas',compact('postsForo'));

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
