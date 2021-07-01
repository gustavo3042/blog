@extends('layouts.Categorias')
@section('contenido')


  <h1>Editar Categoria</h1>

  @if (Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
  @endif

  
  <div class="card">
    <div class="card-body">

      {!!Form::model($categoria,['route'=>['categorias.update',$categoria],'method' => 'put'])!!}

  <div class="form-group">


  {!! Form::label('name','Nombre')!!}
  {!! Form::text('name',null,['class' => 'form-control','placeholder' =>'Ingrese nombe de la categoria'])!!}



  @error ('name')
    <span class="text-danger">{{$message}}</span>
  @enderror



  </div>




  <div class="form-group">


  {!! Form::label('slug','Slug')!!}
  {!! Form::text('slug',null,['class' => 'form-control','placeholder' =>'Ingrese slug de la categoria'])!!}

  @error ('slug')
    <span class="text-danger">{{$message}}</span>
  @enderror




  </div>


  {!! Form::submit('Actualizar categoria',['class' =>'btn btn-primary'])!!}
    {!!Form::close()!!}
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

@endsection
