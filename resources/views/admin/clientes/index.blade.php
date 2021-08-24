@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


<div class="card">


  <div class="card-body">


    <table class="table table-striped">

      <thead>
        <tr>

          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Acciones</th>

        </tr>
      </thead>

      <tbody>

        @foreach ($clientes as $client)


        <tr>
          <td>{{$client->nombre}}</td>
          <td>{{$client->direccion}}</td>
          <td>{{$client->telefono}}</td>
          <td>{{$client->correo}}</td>
          <td>

          {!! Form::open(['route'=>['clientes.destroy',$client],'method'=>'DELETE']) !!}

          {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}

          {!! Form::close() !!}

          </td>

        </tr>

          @endforeach
      </tbody>

    </table>

  </div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
