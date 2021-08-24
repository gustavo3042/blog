@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Crear Reparaciones</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


    <div class="card">

      <div class="card-body">

        {!! Form::open(['route'=>'reparaciones.store']) !!}

        @include('admin.reparaciones.partials.form');

        {!! Form::submit('Crear etiqueta',['class'=>'btn btn-primary']) !!}

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
