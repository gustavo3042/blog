@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')



    @livewire('admin.role-index')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
