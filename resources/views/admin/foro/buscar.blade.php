@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
<div class="card-header">



    <h1 style="font-weight: bold;" class="text-center">Foro Clientes</h1>

    

  </div>
@stop

@section('content')


<div class="card">


  <div class="card-body">


    <div class="card-header">
  
      <a class="btn btn-success" href="{{route('foroPosts.create')}}"><i class="fa fa-file"></i>Crear Post </a>

      <a class="btn btn-primary" href="{{route('foroPosts.index')}}"><i class="fa fa-check"></i>Mis Posts</a>
        
      <a class="btn btn-info" href="{{route('foro.consultas')}}"><i class="fa fa-car"></i>Foro Consultas</a>
        
      <form action="{{route('foro.buscar')}}" method="GET" class="float-right">

         <input  type="text" name="buscar" class="" placeholder="Ingrese Patente">
         <button class="btn-primary" type="submit">Buscar</button>

      </form>
     
     </div>




  
     <div class="card-body">
 
       @if (Session::has('Mensaje'))
 
         <div class="alert alert-success" role="alert">
           {{Session::get('Mensaje')}}
         </div>
 
       @endif
 
   <table class="table table-striped">
   <thead>
     <tr>
       <th>ID</th>
       <th>Encargado</th>
       <th>Patente</th>
       <th  colspan="2">Acciones</th>
      
       
     </tr>
   </thead>
 
   <tbody>
   @foreach ($check1 as $check )
 
   <tr>
     <td>{{$check->id}}</td>
     <td>{{$check->encargado}}</td>
    
 
 
    
     <td>{{$check->patente}}
    
     </td>
     
 
   
    <td width="10px"><a class="btn btn-danger btn-sm" href=""><i class="fa fa-file-pdf">PDF</i></a></td>
    <td width="10px"><a class="btn btn-primary btn-sm" href=""><i class="fa fa-eye">Ver</i></a></td>
 
   
    
 
   
 
    
   </tr>
   @endforeach
   </tbody>
   </table>
     </div>
 
     <div class="card-footer">

      @if($most->totalKilometros >= 5000 && $most->totalKilometros < 10000 && $most->tipoAceite == 5)

    

      <div class="alert alert-danger" role="alert">

        <h6 class="mb-0 text-uppercase">Los kilometros recorridos desde su ultima reparacion son de  {{$most->totalKilometros}} kilometros</h6>
        <hr />

        <strong>Deberia cambiar el aceite de su vehiculo a un aceite mineral</strong>

        
      </div>


      @elseif($most->totalKilometros >= 10000 && $most->totalKilometros < 20000 && $most->tipoAceite == 5)


      <div class="alert alert-danger" role="alert">

        <h6 class="mb-0 text-uppercase">Los kilometros recorridos desde su ultima reparacion son de  {{$most->totalKilometros}} kilometros</h6>
        <hr />

        <strong>Deberia cambiar el aceite de su vehiculo a un aceite semisintetico</strong>

        
      </div>



      @elseif($most->totalKilometros >= 20000 && $most->totalKilometros < 30000 && $most->tipoAceite == 5)


      <div class="alert alert-danger" role="alert">

        <h6 class="mb-0 text-uppercase">Los kilometros recorridos desde su ultima reparacion son de  {{$most->totalKilometros}} kilometros</h6>
        <hr />

        <strong>Deberia cambiar el aceite de su vehiculo a un aceite sintetico</strong>

        
      </div>


      @elseif($most->totalKilometros >= 30000 &&  $most->tipoAceite == 5)


      <div class="alert alert-danger" role="alert">

        <h6 class="mb-0 text-uppercase">Los kilometros recorridos desde su ultima reparacion son de  {{$most->totalKilometros}} kilometros</h6>
        <hr />

        <strong>Deberia cambiar el aceite de su vehiculo usando un aceite de alto kilometraje</strong>

        
      </div>



    

    


          
      @endif

     
      
     </div>
 
 
    
 
 
 </div>
 
 



  </div>





@stop
