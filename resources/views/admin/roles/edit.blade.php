@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Editar Roles</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


<div class="card">

  <div class="card-body">


{!! Form::model($role,['route'=>['roles.update',$role],'method'=>'put']) !!}


@include('admin.roles.partials.form')


{!! Form::submit('Editar Rol',['class'=>'btn btn-primary']) !!}

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
