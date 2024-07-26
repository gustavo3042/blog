@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')
    

@livewire('admin.ventas.dynamic-form')

 

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop