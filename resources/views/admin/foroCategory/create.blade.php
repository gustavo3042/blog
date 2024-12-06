@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')
  
    
  <div class="card">



    <div class="card-header">

        <h2 style="font-weight: bold;" class="text-center pt-5 mb-4">Crear Categoria Foro </h2>

        <a class="btn btn-primary btn-sm mb-4" href="{{route('foroCategory.index')}}">Volver</a>

    </div>



    <div class="card-body">

        <form action="{{route('foroCategory.store')}}" method="post">

            @csrf
            

            <div class="form-group">

                <label for="nombre">Nombre categoria consulta</label>

                <input type="text" name="nombre" class="form-control" placeholder="Escriba categoria">


            </div>

            <br>
            

            <button type="submit" class="btn btn-primary btn-sm " >Guardar</button>


        </form>



    </div>


  </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
