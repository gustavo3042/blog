<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\Autos;
use Livewire\Component;
use App\Models\CheckList;
use Illuminate\Support\Facades\DB;
use App\Models\Reparaciones;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Insumo;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\Kilometraje;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;



class DynamicForm extends Component
{

   use WithPagination;
   use WithFileUploads;

   protected $paginationTheme= "bootstrap";

   public $fields = [];
   public $proveedores = [];
    
   public $patente;
   public $nombre;
   public $direccion;
   public $telefono;
   public $correo;
   public $fecha;
   public $tipoDireccion;
   public $tipoTraccion;
   public $tipoCombustion;
   public $cilindrada;
   public $marca;
   public $modelo;
   public $ano;
   public $color;
   public $kilometraje;
   public $problema;
   public $solucion;

   public $status;

    public $reparaciones = [];
    public $reparar = []; 

    public $precio = [];
    public $precioRepuestos = [];
    public $total = 0;

    public $image;
    public $currentImage;

    public $changeProveedor;

    public  $col = [];
    public $aceites;
    public $cambiosDeAceite;
    public $cambio;

    public $autos1;

 /*    public $cambioAceite = [

        'checkbox1' => false,
        'checkbox2' => false,
    ]; */



   public function updatingSearch(){
  
    $this->resetPage();
  
    }
  

     public function mount($initialImage = null){
    
       
       $this->reparar = Reparaciones::all();
       $this->aceites = Insumo::where('tipoProducto',1)->get();

       $this->fields[] = ['id' => uniqid(),'trabajo'=> '','cantidad'=>1,'precio'=> 0,'repuestos'=>'','checkbox1'=>false,'checkbox2'=>false,'tipoAceite'=> 4,'cantidadRepuestos'=>1,'precioRepuestos'=>0,'amount'=>0];

       $this->proveedores[] = ['nameRazonSocial'=>'','direccionProveedor'=>'','rutProveedor'=>''];

       $this->currentImage = $initialImage;
    }


   
    public function addProveedor(){

        $this->proveedores[] = ['nameRazonSocial'=>'','direccionProveedor'=>'','rutProveedor'=>''];

       /*  $c = collect($this->col);
        $c->push($this->nameRazonSocial);
        dd($c->all()); */
    }

    public function addField(){

        $this->fields[] = ['id' => uniqid(),'trabajo'=>'','cantidad'=>1,'precio'=>0,'repuestos'=>'','checkbox1'=>false,'checkbox2'=>false,'tipoAceite'=> 4,'cantidadRepuestos'=>1,'precioRepuestos'=>0,'amount'=>0];
        $this->calcularTotal();

       

    }

   

    public function updatedFields($value, $name)
    {//este es un update del array this->fields[] en cual actualiza los checkbox
    //recibe el tru si se selecciona el si y un false si se selecciona un no
    // y el name es index junto con el nombre del checkbox:checkbox1 o checkbox2

        //rowIndex es el index del array 
        //field es el checkbox1 o checkbox2

      //  dd($value,$name);
/* 
        list($rowIndex, $field) = explode('.', $name);
   



        if ($field == 'checkbox1') {
            $this->fields[$rowIndex]['checkbox2'] = false;

        } elseif ($field == 'checkbox2') {
            $this->fields[$rowIndex]['checkbox1'] = false;
        } */


        list($rowIndex, $field) = explode('.', $name);

        if ($field === 'checkbox1' && $value) {
            foreach ($this->fields as $i => $field) {
                $this->fields[$rowIndex]['checkbox2'] = false;
            
                if ($i != $rowIndex) {
                    $this->fields[$i]['checkbox1'] = false;
                    
                    $this->dispatchBrowserEvent('disable-checkbox', ['id' => $this->fields[$i]['id'], 'checkbox' => 'checkbox1']);
                    /*  $this->dispatchBrowserEvent('disable-checkbox', ['id' => $this->fields[$i]['id'], 'checkbox' => 'checkbox2']);  */
                }
            }

        } elseif($field == 'checkbox2'){

            $this->fields[$rowIndex]['checkbox1'] = false;
            $this->fields[$rowIndex]['checkbox3'] = false;

        }
    /*     if ($field === 'checkbox2' && $value) {
            foreach ($this->fields as $i => $field) {
                if ($i != $rowIndex) {
                    $this->fields[$i]['checkbox2'] = false;
                    $this->dispatchBrowserEvent('disable-checkbox', ['id' => $this->fields[$i]['id'], 'checkbox' => 'checkbox2']);
                }
            }

        } */



        $this->calcularTotal();
    }

  

    public function calcularAmount($index){

      $this->fields[$index]['amount'] = ($this->fields[$index]['cantidad'] * $this->fields[$index]['precio']) - $this->fields[$index]['cantidadRepuestos'] * $this->fields[$index]['precioRepuestos'] ; // matriz filas columnas ($index,amount)
    }


    public function calcularTotal()
    {
        $this->total = 0;

        foreach ($this->fields as $index => $trabajo) {

            $this->fields[$index]['total'] = (intval($trabajo['cantidad']) * intval($trabajo['precio'])) - intval($this->fields[$index]['cantidadRepuestos']) * intval($this->fields[$index]['precioRepuestos']);
            $this->total += $this->fields[$index]['total'];
        }
    }

     public function removeField($index){

          //  dd($this->fields[$index]);
            unset($this->fields[$index]);
            $this->fields = array_values($this->fields);
            $this->calcularTotal();

    }
  

    public function updatedImage()
    {
       /*  $this->validate([
            'image' => 'image|max:1024', // 1MB máximo
        ]);
 */
        // Guardar la nueva imagen en el almacenamiento público
        $path = $this->image->store('images_check', 'public');
        $this->currentImage = $path;
    }


    public function render()
    {

     

        $tipoD = [
  
            'Mecanica' => 'Mecanica',
            'Hidraulica' => 'Hidraulica',
            'Electrica' => 'Electrica'
    
          ];

          
        $tipoT = [
  
            '2x4' => '2x4',
            '4x4' => '4x4',
          
    
          ];

          $tipoC = [
  
            'Gasolina' => 'Gasolina',
            'Diesel' => 'Diesel',
            'Gas' => 'Gas'
          
    
          ];

        return view('livewire.admin.ventas.dynamic-form',compact('tipoD','tipoT','tipoC'));
    }


     public function updatedPatente()
    {
        $this->buscarVehiculo();
    }


    public function buscarVehiculo()
    {

//      $this->autos1 = Autos::where('patente',$this->patente)->with('check_lists')->get();

      //dd($this->autos1);

        $most = CheckList::join('clientes_check_list','clientes_check_list.check_lists_id','=','check_lists.id')
        ->join('clientes','clientes.id','=','clientes_check_list.clientes_id')
        ->join('autos','autos.check_lists_id','=','check_lists.id')
        ->join('kilometrajes','kilometrajes.autos_id','=','autos.id')
        ->where('check_lists.patente',$this->patente)
        ->select('check_lists.id as id','clientes.nombre as nombre','clientes.direccion as direccion',
        'clientes.telefono as telefono','clientes.correo as  correo',
        'check_lists.fecha as  fecha','autos.tipoDireccion as tipoDireccion',
        'autos.tipoTraccion as tipoTraccion','autos.cilindrada as cilindrada',
        'autos.marca as marca','autos.modelo as modelo',
        'autos.ano as ano','autos.color as color','autos.id as autos_id',
        'kilometrajes.kilometraje as  kilometraje','kilometrajes.id as km_id',
        'autos.patente')
        ->orderBy('kilometrajes.id','desc')
        ->first();

        if ($most) {

            $this->nombre = $most->nombre;
            $this->direccion = $most->direccion;
            $this->telefono = $most->telefono;
            $this->correo = $most->correo;
            $this->fecha = $most->fecha;
            $this->tipoDireccion = $most->tipoDireccion;
            $this->tipoTraccion = $most->tipoTraccion;
            $this->cilindrada = $most->cilindrada;
            $this->marca = $most->marca;
            $this->modelo = $most->modelo;
            $this->ano = $most->ano;
            $this->color = $most->color;
            $this->kilometraje = $most->kilometraje;
            

        }else{

            $this->nombre = '';
            $this->direccion = '';
            $this->telefono = '';
            $this->correo = '';
            $this->fecha = '';
            $this->tipoDireccion = '';
            $this->tipoTraccion = '';
            $this->cilindrada = '';
            $this->marca = '';
            $this->modelo = '';
            $this->ano = '';
            $this->color = '';
            $this->kilometraje = '';
        }


    } 


    public function store(){

     //   dd($this->reparaciones,$this->fields,$this->image,$this->total,$this->cambio,$this->cambiosDeAceite);



        $check_list = CheckList::create([

            'encargado' => auth()->user()->name,
            'fecha' => Carbon::now(),
            'status'=> $this->status,
            'problema'=> $this->problema,
            'solucion'=> $this->solucion,
            'patente' => $this->patente,
            'user_id' => auth()->user()->id,
            'statusNow' => 1,
            'problema' => $this->problema,
            'solucion'=>$this->solucion
            

        ]);


        $presupuesto = Presupuesto::create([

            'total' => $this->total,
            'iva' => $this->total * 0.19,
            'subtotal' => (($this->total * 0.19) + $this->total),
            'check_lists_id' => $check_list->id

        ]);


         foreach ($this->fields as $indexP => $presupuestos) {
            $ar = array([
                
                'trabajo' => $this->fields[$indexP]['trabajo'],
                'descripcion' => $this->fields[$indexP]['repuestos'],
                'cantidadRepuestos'=> $this->fields[$indexP]['cantidadRepuestos'],
                'precioRepuestos' => $this->fields[$indexP]['precioRepuestos'],
                'totalRepuestos' => $this->fields[$indexP]['precioRepuestos'] * $this->fields[$indexP]['cantidadRepuestos'],
                'cantidad' => $this->fields[$indexP]['cantidad'],
                'precio' => $this->fields[$indexP]['precio'],
                'amount'=> $this->fields[$indexP]['amount'],    
                'presupuestos_id' => $presupuesto->id

                 ]);
            PresupuestoDetails::insert($ar);
        }



        
      //veo si ya existe la patente anteriormente
      $checkClient = CheckList::where('patente',$this->patente)->first();

      //veo en la tabla cliente si esta algun check_list_id relacionado "revisa si ya estaba el cliente registrado"
      $clientNew = Cliente::where('check_lists_id',$checkClient->id)->first();

    if (empty($clientNew->check_lists_id)) {//en caso no estar me crea el cliente nuevo

    $client =  Cliente::create([

        'nombre' =>$this->nombre,
        'direccion' =>$this->direccion,
        'telefono' =>$this->telefono,
        'correo' =>$this->correo,
        'check_lists_id' => $check_list->id

      ]);

      /* 
      $clientMost = DB::table('check_lists_clientes')
      ->insert(['check_lists_id'=> $check_list->id,'clientes_id' =>$client->id ]); */

      $clientMost = $check_list->clientes()->attach($client->id);


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
/* 
      $clientMost = DB::table('check_lists_clientes')
      ->insert(['check_lists_id'=> $check_list->id,'clientes_id' => $clientId]); */

      $clientMost = $check_list->clientes()->attach($clientId);


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

 /*    foreach($this->fields as $x => $y){

      if ($y['checkbox1']) {
          
          $this->cambio = $y;
          $this->cambiosDeAceite = $x;
      }
        
  } */




//inicio de configuracion de vehiculo y kilometrajes para aceite y control de insumos

    

$checkAuto = CheckList::where('patente',$this->patente)->first(); //buscamos un checklist asociado a un auto
$autoNew = Autos::where('patente',$checkAuto->patente)->first(); //obtenemos el auto si es q existe el check list con una patente registrada asociada al auto


if (empty($autoNew->patente)) {
 

  $autoCreate = Autos::create([

    'patente'=>$this->patente,
    'marca' => $this->marca,
    'modelo' => $this->modelo,
    'ano' => $this->ano,
    'color' => $this->color,
    'check_lists_id' =>$check_list->id,
    'tipoDireccion' =>$this->tipoDireccion,
    'tipoTraccion' =>$this->tipoTraccion,
    'tipoCombustion' =>$this->tipoCombustion,
    'cilindrada' =>$this->cilindrada,

  ]);



  $check_list->autos()->attach($autoCreate->id); 
  $searchKlm = Kilometraje::where('autos_id',$autoCreate->id)->get()->toArray(); 

  $ar =  count($this->fields);


  if ($ar == 1) {

    $firstField = $this->fields[0];

    if (!$firstField['checkbox1'] && !$firstField['checkbox2']) {

      $kilometraje = Kilometraje::create([
        'tipoAceite' => 0,
         'kilometraje' => $this->kilometraje,
         'newKilometraje' => 0,
         'mostKilometraje' =>0,
         'check_lists_id' =>$check_list->id,
         'autos_id' => $autoCreate->id
    
      ]);

    }
  

  }


  if (count($searchKlm) <= 0 && $ar == 1) {
    

    foreach($this->fields as $x => $y){

      if ($y['checkbox1']) {
          

          $insumos = Insumo::find($y['tipoAceite']);

           if ($insumos->id == 3 || $insumos->id == 2 || $insumos->id == 1) {
          
            $kilometraje = Kilometraje::create([
              'tipoAceite' => $y['tipoAceite'],
               'kilometraje' => $this->kilometraje,
               'newKilometraje' => 0,
               'mostKilometraje' =>0,
               'check_lists_id' =>$check_list->id,
               'autos_id' => $autoCreate->id
          
            ]);

            $insumosStock = Insumo::find($y['tipoAceite'])->update([
    
              'stock' => $insumos->stock - $y['cantidadRepuestos'],
    
            ]);

          } 

      }elseif($y['checkbox2']){

        
        $insumos = Insumo::find($y['tipoAceite']);

        if ($insumos->id == 3 || $insumos->id == 2 || $insumos->id == 1) {
       
         $kilometraje = Kilometraje::create([
           'tipoAceite' => $y['tipoAceite'],
            'kilometraje' => $this->kilometraje,
            'newKilometraje' => 0,
            'mostKilometraje' =>0,
            'check_lists_id' =>$check_list->id,
            'autos_id' => $autoCreate->id
       
         ]);

         $insumosStock = Insumo::find($y['tipoAceite'])->update([
 
           'stock' => $insumos->stock - $y['cantidadRepuestos'],
 
         ]);

       } 
      }
    }

  }

  
//Si el auto no existe o no esta creado crea el nuevo kilometraje
  if (count($searchKlm) <= 0 && $ar > 1){

    $kilometraje = Kilometraje::create([
      'tipoAceite' => 0,
       'kilometraje' => $this->kilometraje,
       'newKilometraje' => 0,
       'mostKilometraje' =>0,
       'check_lists_id' =>$check_list->id,
       'autos_id' => $autoCreate->id
  
    ]);
  

  foreach($this->fields as $x => $y){
  

      if ($y['checkbox1']) {
          
        $insumos = Insumo::find($y['tipoAceite']);

        if ($insumos->id == 3 || $insumos->id == 2 || $insumos->id == 1) {

          $changeKilometraje = Kilometraje::find($kilometraje->id)->update([

            'tipoAceite' => $insumos->id

          ]);
              
          $insumosStock = Insumo::find($y['tipoAceite'])->update([
 
            'stock' => $insumos->stock - $y['cantidadRepuestos'],
  
          ]);
         
        }

          } 
      
      if($y['checkbox2']){

 
        $insumos = Insumo::find($y['tipoAceite']);

        if ($insumos->id == 3 || $insumos->id == 2 || $insumos->id == 1) {

          $changeKilometraje = Kilometraje::find($kilometraje->id)->update([

            'tipoAceite' => $insumos->id

          ]);
              
          $insumosStock = Insumo::find($y['tipoAceite'])->update([
 
            'stock' => $insumos->stock - $y['cantidadRepuestos'],
  
          ]);
         
        }
      }     
  }
}




}elseif(!empty($autoNew->patente)){

  $check_list->autos()->attach($autoNew->id); 
  $ultimoKilometraje = Kilometraje::where('autos_id',$autoNew->id)->latest('id')->first();
  if($this->kilometraje <= $ultimoKilometraje->kilometraje){
    $this->emit('kilometrajeErrado');
    return;
  }

  $newKilometraje  = $this->kilometraje - $ultimoKilometraje->kilometraje;
  $ar =  count($this->fields);

  if ($ar == 1) {

    $firstField = $this->fields[0];

    if (!$firstField['checkbox1'] && !$firstField['checkbox2']) {

      $kilometraje = Kilometraje::create([
        'tipoAceite' => 0,
         'kilometraje' => $this->kilometraje,
         'newKilometraje' => 0,
         'mostKilometraje' =>0,
         'check_lists_id' =>$check_list->id,
         'autos_id' => $autoNew->id
    
      ]);
    }
    
    foreach($this->fields as $x => $y){

      if ($y['checkbox1'] || $y['checkbox2']) {
          
          $insumos = Insumo::find($y['tipoAceite']);

           if (in_array($insumos->id,[1,2,3])) {
          
            $kilometraje = Kilometraje::create([
              'tipoAceite' => $y['tipoAceite'],
               'kilometraje' => $this->kilometraje,
               'newKilometraje' => $newKilometraje,
               'mostKilometraje' =>0,
               'check_lists_id' =>$check_list->id,
               'autos_id' => $autoNew->id
          
            ]);

            $insumos->update([
              'stock' => $insumos->stock - $y['cantidadRepuestos'],
          ]);

          } 

      }
    }
  }
//Si el auto no existe o no esta creado crea el nuevo kilometraje
  if ($ar > 1){

    $kilometraje = Kilometraje::create([
      'tipoAceite' => 0,
      'kilometraje' => $this->kilometraje,
      'newKilometraje' => $newKilometraje,
      'mostKilometraje' => 0,
      'check_lists_id' => $check_list->id,
      'autos_id' => $autoNew->id
  ]);

  foreach ($this->fields as $x => $y) {
    if ($y['checkbox1'] || $y['checkbox2']) {
        $insumos = Insumo::find($y['tipoAceite']);

        if (in_array($insumos->id, [1, 2, 3])) {
            $kilometraje->update([
                'tipoAceite' => $insumos->id
            ]);

            $insumos->update([
                'stock' => $insumos->stock - $y['cantidadRepuestos'],
            ]);
        }
    }
}
}
$this->emit('registroCreado');
}
    }




}