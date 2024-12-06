@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
    <h1></h1>
@stop

@section('content')


  <h1>Crear etiqueta</h1>


  <div class="card">

<div class="card-body">

  {!! Form::open(['route'=>'tags.store']) !!}

  @include('Admin.tags.partials.form')

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

@stop
