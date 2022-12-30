@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Lista Reparaciones</h1>
  
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>









    <div class="card">


      <div class="card-header">

        <a class="btn btn-secondary" href="{{route('reparaciones.create')}}">Crear Reparación</a>

      </div>

      <div class="card-body">


<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre Reparacion</th>
        <th>Precio Aproximado</th>
        <th>Acciones</th>
    </tr>
  </thead>


  <tbody>

    @foreach ($reparaciones as $reparacione)

  <tr>
    <td>{{$reparacione->id}}</td>
    <td>{{$reparacione->name}}</td>
      <td>{{$reparacione->Precio}}</td>

    <td width='10px'>

<a class="btn btn-primary btn-sm" href="{{route('reparaciones.edit',$reparacione)}}">Editar</a>


    </td>


    <td width='10px'>

{!! Form::open(['route'=>['reparaciones.destroy',$reparacione],'method'=>'DELETE']) !!}


{!! Form::submit('Eliminar', ['class'=>'btn btn-danger btn-sm']) !!}

{!! Form::close() !!}

    </td>


  </tr>



  </tbody>


    @endforeach
</table>
      </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop
