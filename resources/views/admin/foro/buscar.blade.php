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
  
      <a class="btn btn-success" href=""><i class="fa fa-file"></i>Crear Post </a>

      <a style="color:white; background: darkcyan;" href=""><i class="fa fa-check"></i>Mis Posts</a>
        
        
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
   @foreach ($checkl as $check )
 
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
      
     </div>
 
 
    
 
 
 </div>
 
 



  </div>





@stop
