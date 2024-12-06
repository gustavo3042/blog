
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
    <h1 style="font-weight: bold;" class="text-center">Listado de Posts</h1>
@stop

@section('content')


@livewire('admin.posts-index')


@stop
