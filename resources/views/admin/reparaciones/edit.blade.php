@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Editar Reparaciones</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">

      <div class="card-body">

        {!! Form::model($reparacione,['route'=>['reparaciones.update',$reparacione],'method'=>'put']) !!}

        @include('admin.reparaciones.partials.form');

        {!! Form::submit('Editar Reparaciones',['class'=>'btn btn-primary']) !!}

        {!! Form::open() !!}

      </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
