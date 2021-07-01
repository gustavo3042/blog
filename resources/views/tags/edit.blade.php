@extends('layouts.tags')
@section('contenido')


  <h1>Editar etiqueta</h1>



<div class="card">

  <div class="card-body">

    {!! Form::model($tag,['route'=> ['tags.update',$tag],'method'=>'put']) !!}



@include('tags.partials.form')

{!! Form::submit('Actualizar etiqueta',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

  </div>

</div>

@endsection
