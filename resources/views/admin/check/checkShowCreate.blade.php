@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

@stop

@section('content')


@livewire('admin.check-show-create',['id'=>$id])


@stop