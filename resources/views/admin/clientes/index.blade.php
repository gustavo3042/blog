@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')
    



    @livewire('admin.clientes.clientes')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
