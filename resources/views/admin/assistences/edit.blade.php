@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
  
@stop

@section('content')

<form method="POST" action="{{ route('assistance.update',$id) }}"  role="form" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
@livewire('admin.assistances.assistances',['id' => $id])
</form>
@stop



@section('js')
 
@stop
