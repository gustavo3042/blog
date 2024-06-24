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
use App\Models\Insumo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Worker;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isEmpty;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

      $this->middleware('can:admin.check.index')->only('index');
      $this->middleware('can:admin.check.create')->only('create','store');
      $this->middleware('can:admin.check.edit')->only('edit','update');
      $this->middleware('can:admin.check.destroy')->only('destroy');
      $this->middleware('can:admin.check.documentoPdf')->only('documentoPdf');
      $this->middleware('can:admin.check.show')->only('show');
      $this->middleware('can:admin.check.addWorkers')->only('addWorkers');
      
    }

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
      $totalRepuestos = PresupuestoDetails::where('presupuestos_id',$check->id)->sum('totalRepuestos');
     // dd($totalRepuestos);
      $correo = DB::table('check_lists')
      ->join('users','users.id','=','check_lists.user_id')
      ->where('check_lists.id',$id)->first();

     // dd($correo);

    //dd($presupuestDetails);

      $pdf = PDF::loadView('admin.check.documentoPdf',compact('check','presupuesto','presupuestDetails','correo','totalRepuestos'));
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


      //dd($request->tipoAceite,$request->kilometraje);
    $check = CheckList::create($request->all());


    $checkA = $check->id;

      $dt = new Presupuesto();
      $dt->id;
      $prom = 0;
      $repuest = 0;
      
  
     
      foreach ($request->precioRepuestos as $key => $val) {
        $repuest += $request->precioRepuestos[$key] * $request->cantidadRepuestos[$key];
        $prom += $request->amount[$key];
      }

     // dd(($prom + $repuest) * 0.19);

      $dt->total = ($prom + $repuest);
      $dt->iva = ($prom + $repuest) * 0.19;
      $dt->subtotal = (($prom + $repuest) * 0.19) + $prom + $repuest;
      $dt->check_lists_id =  $checkA;
     // $dt->created_at = $check->fecha;
     // $dt->updated_at = $check->fecha;
      $dt->save();


      

      if (count($request->product_name) > 0) {


        
        
        foreach ($request->product_name as $key => $value) {
        

          $data = array(

            'trabajo' => $request->product_name[$key],
            'descripcion' => $request->brand[$key],
            'cantidadRepuestos' => $request->cantidadRepuestos[$key],
            'precioRepuestos' => $request->precioRepuestos[$key],
            'totalRepuestos' => $request->precioRepuestos[$key] * $request->cantidadRepuestos[$key] ,

            'cantidad' => $request->quantity[$key],
            'precio'=> $request->budget[$key],
            'amount' => $request->amount[$key],
            'presupuestos_id' => $dt->id

          );

        

          PresupuestoDetails::insert($data);

        }


      }


      $checkClient = CheckList::where('patente',$request->patente)->first();


      $clientNew = Cliente::where('check_lists_id',$checkClient->id)->first();

    if (empty($clientNew->check_lists_id)) {

    $client =  Cliente::create([

        'nombre' =>$request->nombre,
        'direccion' =>$request->direccion,
        'telefono' =>$request->telefono,
        'correo' =>$request->correo,
        'check_lists_id' => $check->id

      ]);

      $clientMost = DB::table('check_lists_clientes')
      ->insert(['check_lists_id'=> $checkA,'clientes_id' =>$client->id ]);


      $userNew = User::where('email',$client->correo)->get();

      if (count($userNew) > 0) {

      
        
      }else{

        $role = Role::where('id',2)->first();
        $userCreate = new User();

        $userCreate->name = $client->nombre;
        $userCreate->email = $client->correo;
        $userCreate->password = bcrypt($client->telefono); 
        $userCreate->save();

        $userCreate->roles()->sync($role->id);

      }
    
    }else{
      
      $clientId = $clientNew->id;
      $clientCorreo = $clientNew->correo;

      $clientMost = DB::table('check_lists_clientes')
      ->insert(['check_lists_id'=> $checkA,'clientes_id' => $clientId]);


      $userNew = User::where('email',$clientCorreo)->get();

      if (count($userNew) > 0) {

        
        
      }else{

      
      $role = Role::where('id',2)->first();
      $userCreate = new User();

      $userCreate->name = $clientNew->nombre;
      $userCreate->email = $clientNew->correo;
      $userCreate->password = bcrypt($clientNew->telefono); 
      $userCreate->save();
      $userCreate->roles()->sync($role->id);
     

      }
      
    }



    $checkAuto = CheckList::where('patente',$request->patente)->first(); //buscamos un checklist asociado a un auto
    $autoNew = Autos::where('patente',$checkAuto->patente)->first(); //obtenemos el auto si es q existe el check list con una patente registrada asociada al auto

     if (empty($autoNew->patente)) {//preguntamos si esta vacio, si esta vacio crea un nuevo vehiculo


        $autosL= new Autos();
        $autosL->patente = $request->patente;
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

        $autosMost = DB::table('check_lists_autos')
        ->insert(['check_lists_id'=> $checkA,'autos_id' =>$autosL->id ]);


        Kilometraje::insert([

          'tipoAceite'=>$request->tipoAceite,
          'kilometraje'=> $request->kilometraje,
          'newKilometraje'=> 0,
          'mostKilometraje' => 0,
          'check_lists_id' => $autosL->check_lists_id,
          'autos_id'=> $autosL->id

        ]);

      

      
       $checkAuto = CheckList::where('patente',$request->patente)->first();
       $autoNew = Autos::where('check_lists_id',$checkAuto->id)->first();
       $autosId = $autoNew->id;
       $kil = Kilometraje::where('autos_id',$autoNew->id)->first();
       $kil2 = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
       
    
    
          //if para el aceite para cuando se crea un checklist por primera vez
    
      if ($kil->check_lists_id == null && $kil->autos_id == true) {
    
        //si no existe ni un check list ni un auto asociado hace lo siguiente
    
      
    
        if ($request->tipoAceite == 5) {
        
         
       
           $checkAuto2 = CheckList::where('patente',$request->patente)->first();
       
           
        
              $kmCar = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
    
              if ($request->kilometraje < $kmCar->kilometraje) {
    
                dd('No puede ingresar un kilometraje menor al ultimo registrado, vuelva a registrar el kilometraje');
              }
    
            
       
               //cuando crees el auto debes poner el kilometraje por eso es q el sumar queda en 0
               //en la migracion de kilometrajes poner el check_lists_id como nullable
        
              $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
       
              $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
        
                
              Kilometraje::where('check_lists_id',$check->id)->update([
        
                'tipoAceite' => $request->tipoAceite,
                'kilometraje' => $request->kilometraje,
                'newKilometraje' => $kmNuevo,
                'mostkilometraje' => $mtskm,
                'check_lists_id' => $checkA,
                'autos_id' =>  $kmCar->autos_id
        
        
              ]);
        
    
          }elseif ($request->tipoAceite == 1 || $request->tipoAceite == 2 || $request->tipoAceite == 3 || $request->tipoAceite == 4) {
           
      
        
              $kmCar = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
      
        
              $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
        
              $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
                

              Kilometraje::where('check_lists_id',$check->id)->update([ //editamos dado que el kilometraje de este auto se acaba de crear anteriormente
        
                'tipoAceite' => $request->tipoAceite,
                'kilometraje' => $request->kilometraje,
                'newKilometraje' => 0,
                'mostkilometraje' => 0,
                'check_lists_id' => $checkA,
                'autos_id' =>  $kmCar->autos_id
        
        
              ]);
    
            
           //descartar del stock de insumos el aceite ocupado como repuestos en un check list
    
              foreach ($request->brand as $i => $value) {
    
                // dd($request->brand[$i]);
               if (is_numeric($request->brand[$i])) { 
                 
                 $insumos = Insumo::where('id',$request->brand[$i])->first();     
     
               switch ($insumos->name) {
                 
                 case 'Aceite Total Quartz':
     
                   $insumosTotalQuartz = Insumo::where('id',$insumos->id)->first();
     
                   foreach ($request->cantidadRepuestos as $e => $value) {
     
                     $totalStock =  $insumosTotalQuartz->stock -  $request->cantidadRepuestos[$e];
     
                   }
     
                   $insumosNow = Insumo::where('id',$insumos->id)->update([
     
                     'stock' => $totalStock
           
                   ]);
     
                   $check->insumos()->attach($insumosTotalQuartz->id);
                   
                   break;
     
                   case 'Aceite Wolver 15w40':
     
                     $insumosWolver15w40 = Insumo::where('id',$insumos->id)->first();
     
                     foreach ($request->cantidadRepuestos as $e => $value) {
       
                       $totalStock =  $insumosWolver15w40->stock -  $request->cantidadRepuestos[$e];
       
                     }
       
                     $insumosNow = Insumo::where('id',$insumos->id)->update([
       
                       'stock' => $totalStock
             
                     ]);
     
                     $check->insumos()->attach($insumosWolver15w40->id);
     
                     break;
     
     
                     case 'Aceite Wolver 5w30':
     
                       $insumosWolver5w30 = Insumo::where('id',$insumos->id)->first();
     
                       //dd($insumosWolver5w30);
       
                       foreach ($request->cantidadRepuestos as $e => $value) {
         
                         $totalStock =  $insumosWolver5w30->stock -  $request->cantidadRepuestos[$e];
         
                       }
         
                       $insumosNow = Insumo::where('id',$insumos->id)->update([
         
                         'stock' => $totalStock
               
                       ]);
     
                       $check->insumos()->attach($insumosWolver5w30->id);
       
                       break;
                 
                 default:
     
                       dd('holis');
                   break;
               }
     
            }elseif( !is_numeric($request->brand[$i])){
     
               $s = 1;
             // dd('es un string');
     
             } 
     
              
             }
    
          }
    
      }elseif ($kil2->check_lists_id == true) { //si existe el check list hace esto
      
     
    
     
    
      if ($request->tipoAceite == 5) {
    
     
         $checkAuto2 = CheckList::where('patente',$request->patente)->first();
         
             $autoNew2 = Autos::where('check_lists_id',$checkAuto2->id)->first();
    
      
            $kmCar = Kilometraje::where('autos_id',$autoNew2->id)->latest('id')->first();
      
    
             //cuando crees el auto debes poner el kilometraje por eso es q el sumar queda en 0
             //en la migracion de kilometrajes poner el check_lists_id como nullable
      
            $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
     
            $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
      
              
            Kilometraje::where('check_lists_id',$check->id)->update([
      
              'tipoAceite' => $request->tipoAceite,
              'kilometraje' => $request->kilometraje,
              'newKilometraje' => $kmNuevo,
              'mostkilometraje' => $mtskm,
              'check_lists_id' => $checkA,
              'autos_id' =>  $kmCar->autos_id
      
      
            ]);
      
         
        }elseif ($request->tipoAceite == 1 || $request->tipoAceite == 2 || $request->tipoAceite == 3 || $request->tipoAceite == 4) {
         
     
     
         $checkAuto2 = CheckList::where('patente',$request->patente)->first();
     
        
             $autoNew2 = Autos::where('check_lists_id',$checkAuto2->id)->first();
      
      
            $kmCar = Kilometraje::where('autos_id',$autoNew2->id)->latest('id')->first();
      
      
            $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
      
            $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
              
            Kilometraje::where('check_lists_id',$check->id)->update([
      
              'tipoAceite' => $request->tipoAceite,
              'kilometraje' => $request->kilometraje,
              'newKilometraje' => 0,
              'mostkilometraje' => 0,
              'check_lists_id' => $checkA,
              'autos_id' =>  $kmCar->autos_id
      
      
            ]);
    
          
       
    
          
    
          //preguntar antes que tipo de brand es numerico o letra
          //pero debo preguntar dentro o fuera del foreach
              foreach ($request->brand as $i => $value) {
    
               // dd($request->brand[$i]);
              if (is_numeric($request->brand[$i])) { 
                
                $insumos = Insumo::where('id',$request->brand[$i])->first();     
    
              switch ($insumos->name) {
                
                case 'Aceite Total Quartz':
    
                  $insumosTotalQuartz = Insumo::where('id',$insumos->id)->first();
    
                  foreach ($request->cantidadRepuestos as $e => $value) {
    
                    $totalStock =  $insumosTotalQuartz->stock -  $request->cantidadRepuestos[$e];
    
                  }
    
                  $insumosNow = Insumo::where('id',$insumos->id)->update([
    
                    'stock' => $totalStock
          
                  ]);
    
                  $check->insumos()->attach($insumosTotalQuartz->id);
                  
                  break;
    
                  case 'Aceite Wolver 15w40':
    
                    $insumosWolver15w40 = Insumo::where('id',$insumos->id)->first();
    
                    foreach ($request->cantidadRepuestos as $e => $value) {
      
                      $totalStock =  $insumosWolver15w40->stock -  $request->cantidadRepuestos[$e];
      
                    }
      
                    $insumosNow = Insumo::where('id',$insumos->id)->update([
      
                      'stock' => $totalStock
            
                    ]);
    
                    $check->insumos()->attach($insumosWolver15w40->id);
    
                    break;
    
    
                    case 'Aceite Wolver 5w30':
    
                      $insumosWolver5w30 = Insumo::where('id',$insumos->id)->first();
    
                      //dd($insumosWolver5w30);
      
                      foreach ($request->cantidadRepuestos as $e => $value) {
        
                        $totalStock =  $insumosWolver5w30->stock -  $request->cantidadRepuestos[$e];
        
                      }
        
                      $insumosNow = Insumo::where('id',$insumos->id)->update([
        
                        'stock' => $totalStock
              
                      ]);
    
                      $check->insumos()->attach($insumosWolver5w30->id);
      
                      break;
                
                default:
    
                      dd('holis');
                  break;
              }
    
           }elseif( !is_numeric($request->brand[$i])){
    
              $s = 1;
            // dd('es un string');
    
            } 
    
             
            }
           
        }
    
      }

      //fin del aceite


     }else{



      //aqui existe el auto pero no esta unido a ningun checklist por lo tanto solo debe editar 
      //ingresando el check_lists_id
      if (empty($autoNew->check_lists_id)) {

        $autosL = Autos::where('id',$autoNew->id)->update([


          'patente' => $request->patente,
          'marca' => $request->marca,
          'modelo' => $request->modelo,
          'ano' => $request->ano,
          'color' => $request->color,
          'check_lists_id' => $checkA,
          'tipoDireccion' => $request->tipoDireccion,
          'tipoTraccion' =>  $request->tipoTraccion,
          'tipoCombustion' =>  $request->combustion,
          'cilindrada' => $request->cilindrada,


        ]);

        $autosMost = DB::table('check_lists_autos')
        ->insert(['check_lists_id'=> $checkA,'autos_id' =>$autoNew->id ]);

       
      
      }else {
        

        $autosMost = DB::table('check_lists_autos')
        ->insert(['check_lists_id'=> $checkA,'autos_id' =>$autoNew->id ]);

      }




   $checkAuto = CheckList::where('patente',$request->patente)->first();
   $autoNew = Autos::where('check_lists_id',$checkAuto->id)->first();
   $autosId = $autoNew->id;


   $kil = Kilometraje::where('autos_id',$autoNew->id)->first();
   $kil2 = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
   


      //if para el aceite y kilometraje

  if ($kil->check_lists_id == null && $kil->autos_id == true) {

    //si no existe ni un check list ni un auto asociado hace lo siguiente

  

    if ($request->tipoAceite == 5) { //si no hay cambio de aceite hace lo de abajo
    
     
   
       $checkAuto2 = CheckList::where('patente',$request->patente)->first();
   
       
    
          $kmCar = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();

          if ($request->kilometraje < $kmCar->kilometraje) {

            dd('No puede ingresar un kilometraje menor al ultimo registrado, vuelva a registrar el kilometraje');
          }

        
   
           //cuando crees el auto debes poner el kilometraje por eso es q el sumar queda en 0
           //en la migracion de kilometrajes poner el check_lists_id como nullable
    
          $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
   
          $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
    
            
          Kilometraje::insert([
    
            'tipoAceite' => $request->tipoAceite,
            'kilometraje' => $request->kilometraje,
            'newKilometraje' => $kmNuevo,
            'mostkilometraje' => $mtskm,
            'check_lists_id' => $checkA,
            'autos_id' =>  $kmCar->autos_id
    
    
          ]);
    

      }elseif ($request->tipoAceite == 1 || $request->tipoAceite == 2 || $request->tipoAceite == 3 || $request->tipoAceite == 4) {
       
  
    
          $kmCar = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
  
    
          $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
    
          $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
            
          Kilometraje::insert([
    
            'tipoAceite' => $request->tipoAceite,
            'kilometraje' => $request->kilometraje,
            'newKilometraje' => 0,
            'mostkilometraje' => 0,
            'check_lists_id' => $checkA,
            'autos_id' =>  $kmCar->autos_id
    
    
          ]);

        
        //  dd($request->brand);

          foreach ($request->brand as $i => $value) {

           
            

            // dd($request->brand[$i]);
           if (is_numeric($request->brand[$i])) { 
             
             $insumos = Insumo::where('id',$request->brand[$i])->first();     
 
           switch ($insumos->name) {
             
             case 'Aceite Total Quartz':
 
               $insumosTotalQuartz = Insumo::where('id',$insumos->id)->first();
 
               foreach ($request->cantidadRepuestos as $e => $value) {
 
                 $totalStock =  $insumosTotalQuartz->stock -  $request->cantidadRepuestos[$e];
 
               }
 
               $insumosNow = Insumo::where('id',$insumos->id)->update([
 
                 'stock' => $totalStock
       
               ]);
 
               $check->insumos()->attach($insumosTotalQuartz->id);
               
               break;
 
               case 'Aceite Wolver 15w40':
 
                 $insumosWolver15w40 = Insumo::where('id',$insumos->id)->first();
 
                 foreach ($request->cantidadRepuestos as $e => $value) {
   
                   $totalStock =  $insumosWolver15w40->stock -  $request->cantidadRepuestos[$e];
   
                 }
   
                 $insumosNow = Insumo::where('id',$insumos->id)->update([
   
                   'stock' => $totalStock
         
                 ]);
 
                 $check->insumos()->attach($insumosWolver15w40->id);
 
                 break;
 
 
                 case 'Aceite Wolver 5w30':
 
                   $insumosWolver5w30 = Insumo::where('id',$insumos->id)->first();
 
                   //dd($insumosWolver5w30);
   
                   foreach ($request->cantidadRepuestos as $e => $value) {
     
                     $totalStock =  $insumosWolver5w30->stock -  $request->cantidadRepuestos[$e];
     
                   }
     
                   $insumosNow = Insumo::where('id',$insumos->id)->update([
     
                     'stock' => $totalStock
           
                   ]);
 
                   $check->insumos()->attach($insumosWolver5w30->id);
   
                   break;
             
             default:
 
                   dd('holis');
               break;
           }
 
        }elseif( !is_numeric($request->brand[$i])){
 
           $s = 1;
         // dd('es un string');
 
         } 
 
          
         }

         
         
       
   
   
   
      }

  }elseif ($kil2->check_lists_id == true) {
  
  //si existe el check list hace esto

 

  if ($request->tipoAceite == 5) {

 
     $checkAuto2 = CheckList::where('patente',$request->patente)->first();
     
         $autoNew2 = Autos::where('check_lists_id',$checkAuto2->id)->first();

  
        $kmCar = Kilometraje::where('autos_id',$autoNew2->id)->latest('id')->first();
  

         //cuando crees el auto debes poner el kilometraje por eso es q el sumar queda en 0
         //en la migracion de kilometrajes poner el check_lists_id como nullable
  
        $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
 
        $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
  
          
        Kilometraje::insert([
  
          'tipoAceite' => $request->tipoAceite,
          'kilometraje' => $request->kilometraje,
          'newKilometraje' => $kmNuevo,
          'mostkilometraje' => $mtskm,
          'check_lists_id' => $checkA,
          'autos_id' =>  $kmCar->autos_id
  
  
        ]);
  
     
    }elseif ($request->tipoAceite == 1 || $request->tipoAceite == 2 || $request->tipoAceite == 3 || $request->tipoAceite == 4) {
     
 
 
     $checkAuto2 = CheckList::where('patente',$request->patente)->first();
 
    
         $autoNew2 = Autos::where('check_lists_id',$checkAuto2->id)->first();
  
  
        $kmCar = Kilometraje::where('autos_id',$autoNew2->id)->latest('id')->first();
  
  
        $kmNuevo = $request->kilometraje - $kmCar->kilometraje;
  
        $mtskm = ($request->kilometraje - $kmCar->kilometraje) + $kmCar->newKilometraje;
          
        Kilometraje::insert([
  
          'tipoAceite' => $request->tipoAceite,
          'kilometraje' => $request->kilometraje,
          'newKilometraje' => 0,
          'mostkilometraje' => 0,
          'check_lists_id' => $checkA,
          'autos_id' =>  $kmCar->autos_id
  
  
        ]);

      
      //preguntar antes que tipo de brand es numerico o letra
      //pero debo preguntar dentro o fuera del foreach

      


          foreach ($request->brand as $i => $value) {

           
            

           // dd($request->brand[$i]);
          if (is_numeric($request->brand[$i])) { 
            
            $insumos = Insumo::where('id',$request->brand[$i])->first();     

          switch ($insumos->name) {
            
            case 'Aceite Total Quartz':

              $insumosTotalQuartz = Insumo::where('id',$insumos->id)->first();

              foreach ($request->cantidadRepuestos as $e => $value) {

                $totalStock =  $insumosTotalQuartz->stock -  $request->cantidadRepuestos[$e];

              }

              $insumosNow = Insumo::where('id',$insumos->id)->update([

                'stock' => $totalStock
      
              ]);

              $check->insumos()->attach($insumosTotalQuartz->id);
              
              break;

              case 'Aceite Wolver 15w40':

                $insumosWolver15w40 = Insumo::where('id',$insumos->id)->first();

                foreach ($request->cantidadRepuestos as $e => $value) {
  
                  $totalStock =  $insumosWolver15w40->stock -  $request->cantidadRepuestos[$e];
  
                }
  
                $insumosNow = Insumo::where('id',$insumos->id)->update([
  
                  'stock' => $totalStock
        
                ]);

                $check->insumos()->attach($insumosWolver15w40->id);

                break;


                case 'Aceite Wolver 5w30':

                  $insumosWolver5w30 = Insumo::where('id',$insumos->id)->first();

                  //dd($insumosWolver5w30);
  
                  foreach ($request->cantidadRepuestos as $e => $value) {
    
                    $totalStock =  $insumosWolver5w30->stock -  $request->cantidadRepuestos[$e];
    
                  }
    
                  $insumosNow = Insumo::where('id',$insumos->id)->update([
    
                    'stock' => $totalStock
          
                  ]);

                  $check->insumos()->attach($insumosWolver5w30->id);
  
                  break;
            
            default:

                  dd('holis');
              break;
          }

       }elseif( !is_numeric($request->brand[$i])){

          $s = 1;
        // dd('es un string');

        } 

         
        }
       
    }

  }

  //fin del if para aceite

     }

     //fin del if de autos
  
  
      if ($request->file('file')) {

      $url = Storage::put('check_lists', $request->file('file'));


      $check->image()->create([

      'url' => $url

      ]);

        }

        //para subir la imagen al storage app public que es donde guardaremos la imagen tuvimos que cambiar la configuracion de el
        //archivo carpeta de configuracion config y despues en el archivo filesystems camibar el default a public = 'default' => env('FILESYSTEM_DRIVER', 'public'),


      if ($request->reparaciones) {


        $check->reparaciones()->attach($request->reparaciones); //attach es para crear en una relacion de muchos a muchos esto es arquitectura

      }




return redirect()->route('check.index',$check);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($check)
    {
    

      return view('admin.check.show',compact('check'));


    }

    public function addWorkers(Request $request)
    {

        //dd($request->all());

        if (empty($request->workers)) {
            Toastr::warning('Favor de Agregar Trabajadores', 'Sin Trabajadores', );

            return redirect()->back();
        }

        // Se obtiene el array de todos los trabajadores
        $workers = $request->workers;

        // se obtiene la faena
        $activeChore = CheckList::find($request->faenaActiva_id);




        foreach ($request->workers as $key => $value) {
            $addWorkers = DB::table('check_lists_workers')->insert([
                'check_lists_id' => $activeChore->id,
                'workers_id' => $request->workers[$key]
            ]);

          

            
            $chor_worker = DB::table('check_lists_workers')->where(['check_lists_id' => $activeChore->id, 'workers_id' => $request->workers[$key]])->first();

            $produccion = DB::table('productions')->insert(
                ['check_lists_id' => $activeChore->id,
                'workers_id' => $chor_worker->id,
                'cantidad' => 0,
                'rendimiento' => 0,
                'pagodiario' => 20000,
                ]
            );

            $asistencia = DB::table('assistances')->insert(
                ['check_lists_id' => $activeChore->id,
                'workers_id' => $chor_worker->id,
                'presente' => 1,
                'inasistencia_id' => 1,
                ]
            );
        }

    


        //Toastr::success('Agregado', 'Trabajadores agregados a la faena con éxito', );
    
       
        return redirect()->route('check.show', $activeChore->id)->with('Mensaje', 'Trabajador agregado con éxito.');
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

   /*
      $clientes = DB::table('check_lists')
      ->join('clientes','clientes.check_lists_id','=' ,'check_lists.id')
      ->select('clientes.nombre','clientes.direccion','clientes.telefono','clientes.correo')
      ->where('clientes.check_lists_id',$check->id)
      ->first();

    */  

      $clientes = DB::table('check_lists')
      ->join('check_lists_clientes','check_lists_clientes.check_lists_id','=','check_lists.id')
      ->join('clientes','clientes.id','=','check_lists_clientes.clientes_id')
      
      ->where('check_lists_clientes.check_lists_id',$check->id)
      ->first();

/*
      $autos = DB::table('check_lists')
      ->join('autos','autos.check_lists_id','=' ,'check_lists.id')
      ->select('autos.marca','autos.modelo','autos.ano','autos.color','autos.cilindrada')
      ->where('autos.check_lists_id',$check->id)
      ->first();

  */    

  $autos = DB::table('check_lists')
  ->join('check_lists_autos','check_lists_autos.check_lists_id','=','check_lists.id')
  ->join('autos','autos.id','=','check_lists_autos.autos_id')
  ->where('check_lists_autos.check_lists_id',$check->id)
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
   $repuest = 0;
     
   foreach ($request->amount as $key => $item) {
     
    $repuest += $request->precioRepuestos[$key] * $request->cantidadRepuestos[$key];
     $prom += $item;
   }
   


    $dts = DB::table('presupuestos')->where('check_lists_id',$checkA)->update(['total'=>$prom,'iva'=>($prom * 0.19) ,'subtotal'=>(($prom * 0.19) + $prom),'check_lists_id' => $checkA, 'created_at'=> $request->fecha, 'updated_at' =>$request->fecha  ]);

  
     if (count($request->product_name) > 0) {
     
     
       
       
       foreach ($request->product_name as $key => $value) {
       
     
         $data = array(
     
           'trabajo' => $request->product_name[$key],
           'descripcion' => $request->brand[$key],
           'cantidadRepuestos' => $request->cantidadRepuestos[$key],
           'precioRepuestos' => $request->precioRepuestos[$key],
           'totalRepuestos' => $request->precioRepuestos[$key] * $request->cantidadRepuestos[$key] ,
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
