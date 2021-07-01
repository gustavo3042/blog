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

<h1>Crear Nuevo Post</h1>

<div class="card">

  <div class="card-body">

    {!! Form::open(['route'=> 'posts.store','autocomplete'=> 'off','files'=>true]) !!}

<!-- incluimos el id del usuario actualmente autentificado, para relacionar el post q se va
ha crear con el usuario que lo esta creando -->
    {!! Form::hidden('user_id',auth()->user()->id) !!}

<div class="form-group">
{!! Form::label('name','Nombre :') !!}
{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del post']) !!}


@error ('name')
<small class="text-danger">{{$message}}</small>
@enderror

</div>


<div class="form-group">
{!! Form::label('slug','Slug :') !!}
{!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Ingrese el slug del post']) !!}

@error ('slug')
  <small class="text-danger">{{$message}}</small>
@enderror

</div>


<div class="form-group">

{!! Form::label('category_id','Categoría') !!}
{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}


@error ('category_id')
  <small class="text-danger">{{$message}}</small>
@enderror
</div>




<div class="form-group">

<p class="font-weight-bold">Etiquetas</p>

@foreach ($tags as $tag)

<label class="mr-2">

{!! Form::checkbox('tags[]',$tag->id,null) !!}
{{$tag->name}}


</label>

@endforeach



@error ('tags')

  <br>
  <small class="text-danger">{{$message}}</small>
@enderror

</div>





<div class="form-group">
<div class="font-weight-bold">Estado</div>

  <label>

{!! Form::radio('status',1,true) !!}
Borrador

  </label>


  <label>

{!! Form::radio('status',2) !!}
Publicado

  </label>



  @error ('status')
    <br>
    <small class="text-danger">{{$message}}</small>
  @enderror
  </div>

<!--Para hacer grid o dividir en partes -->
  <div class="row mb-3">

    <div class="col">
<div class="image-wrapper">

  <img id="picture" src="https://cdn.pixabay.com/photo/2021/05/27/20/53/field-6289253_960_720.jpg" alt="">

</div>
    </div>

    <div class="col">

<div class="form-group">
{!! Form::label('file','Imagen que se mostrara en el post')  !!}
{!! Form::file('file', ['class'=>'form-control-file','accept' => 'image/*']) !!}

@error ('file')
  <span class="text-danger">{{$message}}</span>
@enderror

</div>



Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>

  </div>



<div class="form-group">

{!! Form::label('extract','Extracto') !!}
{!! Form::textarea('extract',null,['class'=>'form-control']) !!}

@error ('extract')
  <small class="text-danger">{{$message}}</small>
@enderror
</div>




<div class="form-group">

{!! Form::label('body','Cuerpo del Post') !!}
{!! Form::textarea('body',null,['class'=>'form-control']) !!}


@error ('body')
  <small class="text-danger">{{$message}}</small>
@enderror

</div>




{!! Form::submit('Crear post',['class'=>'btn btn-primary']) !!}





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
