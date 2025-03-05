
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
   
@stop



@section('content')


 @livewire('admin.calendar-show', ['id' => $id]) 

@stop