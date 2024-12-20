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
use App\Models\PostForoComent;
use PDF;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;



class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

      $this->middleware('can:admin.foro.buscar')->only('index');
     /*  $this->middleware('can:admin.reparaciones.create')->only('create','store');
      $this->middleware('can:admin.reparaciones.edit')->only('edit','update');
      $this->middleware('can:admin.reparaciones.destroy')->only('destroy'); */
    }

    public function index()
    {

      //  $check = DB::table('check_lists')->get();

        return view('admin.foro.index');
    }


    public function buscar(Request $request){

        $buscar = $request->buscar;  

      
      //  dd($buscar);
        /*
        $check = DB::table('check_lists')
        ->join('clientes','clientes.check_lists_id','=','check_lists.id')
        ->join('users','users.name','=','clientes.nombre')        
        ->get();

        */

        $check1 = CheckList::where('patente','LIKE','%'.$buscar.'%')
       // ->where('users.id',auth()->user()->id)
        ->latest('id')
    // ->orderBy('check_lists.id','desc')
        ->get();
      // ->paginate(5);

            
        $most = CheckList::join('autos','autos.check_lists_id','=','check_lists.id')
        ->join('kilometrajes','kilometrajes.autos_id','=','autos.id')
        ->where('check_lists.patente',$buscar)

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



   

    //funcion para documento pdf boleta
    public function documentoPdf($id){

      //  dd($id);
      $check = CheckList::find($id);

      $presupuesto = Presupuesto::where('check_lists_id',$check->id)->first();
      $presupuestDetails = DB::table('presupuesto_details')->where('presupuestos_id',$presupuesto->id)->get();
      $totalRepuestos = PresupuestoDetails::where('presupuestos_id',$presupuesto->id)->sum('totalRepuestos');
    //  dd($totalRepuestos);
      $correo = DB::table('check_lists')
      ->join('users','users.id','=','check_lists.user_id')
      ->where('check_lists.id',$id)->first();

     // dd($correo);

    //dd($presupuestDetails);

      $pdf = PDF::loadView('admin.foro.documentoPdf',compact('check','presupuesto','presupuestDetails','correo','totalRepuestos'));
      return $pdf->setPaper('Doc')->stream('Boleta servicio');

    }



    public function consultas(){


        $postsForo = PostForoConsultas::all();


        return view('admin.foro.foroConsultas',compact('postsForo'));

    }


    public function comentarAdmin($id){

    
     //   dd($id);

        $foroComent = PostForoConsultas::find($id);


        $coment = PostForoComent::where('post_foro_consultas_id',$id)->get();

        $users = User::all();


        return view('admin.foro.foroComentarAdmin',compact('foroComent','coment','users'));



       // dd($foroComent);

    }


    public function comentarClient($id){

    
        //   dd($id);
   
           $foroComent = PostForoConsultas::find($id);
   
   
           $coment = PostForoComent::where('post_foro_consultas_id',$id)->get();
   
          

           $users = User::all();
           

          // dd($most);
   
   
           return view('admin.foro.foroComentarClient',compact('foroComent','coment','users'));
   
   
   
          // dd($foroComent);
   
       }

    public function comentCrear(Request $request){

        //dd($request->all());

        if ($request->client == 0) {
            
            $comentar = PostForoComent::create($request->all());

    

            return redirect()->route('foro.comentarClient',$request->post_foro_consultas_id)->with('Mensaje','Comentario creado con éxito!!!');

        }elseif($request->client == 1){



            $comentar = PostForoComent::create($request->all());

    

            return redirect()->route('foro.comentarAdmin',$request->post_foro_consultas_id)->with('Mensaje','Comentario creado con éxito!!!');


        }

     


    }

    public function comentarEdit(Request $request,$id){


      //  dd($request->all());


      if ($request->edits == 0) {
        

        $most = DB::table('post_foro_coments')->where('id',$id)->update(['bodyComent'=> $request->bodyComent]);


        return redirect()->back()->with('Mensaje','Comentario actualizado con éxito!!!');
        
      }elseif ($request->edits == 1) {
    
        $most = DB::table('post_foro_coments')->where('id',$id)->update(['bodyComent'=> $request->bodyComent]);


        return redirect()->back()->with('Mensaje','Comentario actualizado con éxito!!!');

      }

   // $foroComent = PostForoConsultas::find($id);

  

    }


    public function comentarDelete(PostForoComent $id){


      //  dd($id);

        $id->delete();


        return redirect()->back()->with('Mensaje','Comentario borrado con éxito!!!');
        
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
