@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Nuevo CheckList</h1>
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


    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">

      <div class="card-body">

        {!! Form::open(['route'=>'check.store','autocomplete'=>'off','files'=> true]) !!}

        


          @include('admin.check.partials.form')


        {!! Form::submit('Crear CheckList',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

      </div>

    </div>
@stop

@section('css')

  <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
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
