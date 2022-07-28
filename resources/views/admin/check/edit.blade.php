@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
<div class="card-header">

  <h1 style="font-weight: bold;" class="text-center">Editar Ficha Tecnica</h1>

  <a class="btn btn-primary" href="{{route('check.index')}}">volver</a>

</div>
@stop

@section('content')


  <style>
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

<div class="card">

<div class="card-body">



  {!! Form::model($check,['route'=> ['check.update',$check],'autocomplete'=> 'off','files'=>true,'method'=>'put']) !!}




@include('admin.check.partials.form')


{!! Form::submit('Actualizar Checklist',['class'=>'btn btn-primary']) !!}


{!! Form::close() !!}


</div>

</div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script>


    <script>

    $(document).ready( function() {
      $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    });

    </script>



    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>



    <script>


        ClassicEditor
            .create( document.querySelector( '#problema' ) )
            .catch( error => {
                console.error( error );
            } );


    </script>


    <script>


        ClassicEditor
            .create( document.querySelector( '#solucion' ) )
            .catch( error => {
                console.error( error );
            } );


    </script>


    <script >


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
