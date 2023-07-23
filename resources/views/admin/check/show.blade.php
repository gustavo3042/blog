
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

<div class="card-header">

    <h1 style="font-weight: bold;" class="text-center">Detalles De la Reparación</h1>
    <p style="font-weight: bold;" class="text-center"></p>

    <a class="btn btn-primary" href="{{route('check.index')}}">volver</a>



    
   


</div>

@stop

@section('content')




@stop

@section('css')

  <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')




<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>





<script>


    document.getElementById("file").addEventListener('change', cambiarImagen);
  
          function cambiarImagen(event){
              var file = event.target.files[0];
  
              var reader = new FileReader();
              reader.onload = (event) => {
                  document.getElementById("picture").setAttribute('src', event.target.result);
              };
  
              reader.readAsDataURL(file);
          }
  
  
  
    </script>
  @stop
  