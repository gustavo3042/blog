@extends('layouts.tags')
@section('contenido')


  <h1>Crear etiqueta</h1>


  <div class="card">

<div class="card-body">

  {!! Form::open(['route'=>'tags.store']) !!}

  @include('tags.partials.form')

{!! Form::submit('Crear etiqueta',['class'=>'btn btn-primary']) !!}


  {!! form::close() !!}

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
