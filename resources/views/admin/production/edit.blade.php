@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
  
@stop

@section('content')

<form method="POST" action="{{ route('production.update',$id) }}"  role="form" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
@livewire('admin.production.produccion',['id' => $id])
</form>
@stop



@section('js')
 
@stop
