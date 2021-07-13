@extends('layouts.posts')
@section('contenido')


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

    <h1>Editar Post</h1>


  <div class="card">

    @if (Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">

    {{Session::get('Mensaje')}}

    </div>
    @endif

    <div class="card-body">
<!--Se utiliza siempre Form::model para editar datos y se necesita pasar parametros en este caso es el $post y
se utiliza tambien el metodo put-->

      {!! Form::model($post,['route'=> ['posts.update',$post],'autocomplete'=> 'off','files'=>true,'method'=>'put']) !!}

  <!-- incluimos el id del usuario actualmente autentificado, para relacionar el post q se va
  ha crear con el usuario que lo esta creando -->




  @include('posts.partials.form')


  {!! Form::submit('Actualizar post',['class'=>'btn btn-primary']) !!}





      {!! Form::close() !!}

    </div>

  </div>




  <div class="script">
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>



    <script>


        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );


    </script>


    <script>


        ClassicEditor
            .create( document.querySelector( '#body' ) )
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

  </div>



@endsection
