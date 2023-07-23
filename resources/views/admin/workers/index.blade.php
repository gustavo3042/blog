@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
<div class="card-header">
    <h1 style="font-weight: bold;" class="text-center">Trabajadores</h1>
  </div>
@stop

@section('content')



@livewire('admin.workers.workers-index')


@stop