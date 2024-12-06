@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')


@section('content')
@if (Session::has('Mensaje'))
  <div class="alert alert-danger" role="alert">
    {{Session::get('Mensaje')}}
  </div>
@endif
@if (Session::has('Mensaje2'))
  <div class="alert alert-success" role="alert">
    {{Session::get('Mensaje2')}}
  </div>
@endif
<style >
  .image-wrapper{
position: relative;
padding-bottom: 56.25%;

  }

  .image-wrapper img{

position: absolute;
object-fit: cover;
width: 100%;
height: 100%;
  }

</style>
<br>
<div class="card">


    <div class="card-title">
        <h3 style="font-weight: bold;" class="text-center pt-5">Crear Trabajador</h3>
      </div>   

    <div class="card-body">


{!! Form::open(['route'=> 'workers.store','autocomplete'=> 'off','files'=>true]) !!}


@include('admin.workers.partials.form')


{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}


</div>

</div>

@stop

@section('js')


<script>


document.getElementById("photo").addEventListener('change', cambiarImagen);

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