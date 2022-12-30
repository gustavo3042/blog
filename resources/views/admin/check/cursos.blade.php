@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
    <h1>Boton autocomplete</h1>
@stop

@section('css')
   




@stop

@section('content')


<h1>HOLA</h1>

<form action="">

<div class="input-grup">

    <input type="text"  id="search" class="form-control">

    <div class="input-group-append pt-4">

        <button class="btn btn-danger " type="button">Buscar</button>

    </div>

</div>

</form>
 
@stop



@section('js')



<script>


var cursos = ['html','css','javascript','php','laravel'];

$('#search').autocomplete({

source:cursos

});


</script>

@stop
