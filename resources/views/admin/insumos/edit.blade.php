@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
   
@stop

@section('content')
 

   

     
@livewire('admin.insumos.insumos-edit',['id'=>$id])    

{{-- @livewire('admin.check-show-edit',['id'=>$id]) --}}
      

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
    <script> console.log('Hi!');</script>

@stop
