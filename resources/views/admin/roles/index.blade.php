@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


<div class="card">

  <div class="card-header">
    <a class="btn btn-secondary" href="{{route('roles.create')}}">Crear nuevo Rol</a>
  </div>

  <div class="card-body">

    @if (Session::has('Mensaje'))
      <div class="alert alert-success">
<strong>{{Session::get('Mensaje')}}</strong>
      </div>
    @endif

    <table class="table table-striped">

      <thead>

        <tr>

          <th>ID</th>
            <th>Role</th>
              <th colspan="2">Acciones</th>
        </tr>

      </thead>

      <tbody>

        @foreach ($roles as $role)
          <tr>
            <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>

                <td width="10px">

<a class="btn btn-primary btn-sm" href="{{route('roles.edit',$role)}}">Editar</a>

                </td>


                <td width="10px">

{!! Form::open(['route'=>['roles.destroy',$role],'method'=>'DELETE']) !!}


{!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-sm']) !!}

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
