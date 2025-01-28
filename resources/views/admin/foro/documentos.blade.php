@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

@stop

@section('content')


<div class="card">


@livewire('admin.foro-document',['id'=>$id])




@stop
