@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')



  @if (Session::has('Mensaje'))
    <div class="alert alert-success">
      <strong>{{Session::get('Mensaje')}}</strong>
    </div>
  @endif

    <div class="card">
      <div class="card-body">

        <p class="h5">Nombre: </p>
        <p>{{$user->name}}</p>

<h2 class="h5">Listado Roles</h2>
{!! Form::model($user,['route'=>['users.update',$user],'method'=>'put']) !!}


@foreach ($roles as $role)


<div class="">
  <label>

{!! Form::checkbox('roles[]',$role->id,null,['class'=>'mr-1'] ) !!}
{{$role->name}}

  </label>
</div>
@endforeach

{!! Form::submit('Asignar Rol',['class'=>'btn btn-primary mt-2']) !!}

{!! Form::close() !!}
      </div>

    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
