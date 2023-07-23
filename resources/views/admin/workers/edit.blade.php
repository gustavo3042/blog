@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
    
@stop

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

   

    <br>
  <div class="card">

    <div class="card-title">
        <h3 style="font-weight: bold;" class="text-center pt-5">Crear Trabajador</h3>
      </div>  

    @if (Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">

    {{Session::get('Mensaje')}}

    </div>
    @endif

    <div class="card-body">


 {!! Form::model($worker,['route'=> ['workers.update',$worker],'autocomplete'=> 'off','files'=>true,'method'=>'put']) !!}


 @include('admin.workers.partials.form')


  {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}





      {!! Form::close() !!}

    </div>

  </div>





  @endsection

  @section('js')


  <script >


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
