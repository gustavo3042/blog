
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



   


@section('content')


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


<div class="card">


    <div class="card-header">


        <h2 style="font-weight: bold;" class="text-center pt-5 mb-4">Actualizar Post Foro Consultas</h2>

        <a class="btn btn-primary btn-sm mb-4" href="{{route('foro.index')}}">Volver</a>


    </div>


    <div class="card-body">

        {!! Form::model($postsForo,['route'=> ['foroPosts.update',$postsForo],'autocomplete'=> 'off','files'=>true,'method'=>'put']) !!}

<!-- incluimos el id del usuario actualmente autentificado, para relacionar el post q se va
ha crear con el usuario que lo esta creando -->




@include('admin.foroPosts.partials.form')








{!! Form::submit('Actualizar post',['class'=>'btn btn-primary']) !!}


{!! Form::close() !!}


    </div>


</div>





@endsection


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
        .create( document.querySelector( '#body' ) )
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