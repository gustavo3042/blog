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
  
    
  
      <a class="btn btn-success" href="{{route('foroPosts.create')}}"><i class="fa fa-file"></i>Crear Post</a>

      <a class="btn btn-primary" href="{{route('foroPosts.index')}}"><i class="fa fa-check"></i>Mis Posts</a>
      <a class="btn btn-info" href=""><i class="fa fa-car"></i>Foro Consultas</a>
        
      <form action="{{route('foro.buscar')}}" method="GET" class="float-right">

         <input  type="text" name="buscar" class="" placeholder="Ingrese Patente">
         <button class="btn-primary" type="submit">Buscar</button>

      </form>
     
     </div>


  </div>


</div>


@stop
