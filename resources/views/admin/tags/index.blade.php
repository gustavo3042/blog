
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')
    <h1>Listado de Etiquetas</h1>
@stop

@section('content')


@if (Session::has('Mensaje'))
  <div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}}
  </div>
@endif

<div class="card">


  <div class="card-header">
<a class="btn btn-secondary " href="{{route('tags.create')}}">Agregar Categoria</a>
  </div>


  <div class="card-body">



    <table class="table table-striped">

      <thead>
        <tr>
          <th>id</th>
            <th>Nombre</th>
              <th colspan="2"></th>
        </tr>
      </thead>

    <tbody>


      @foreach ($tags as $tag)
        <tr>

          <td>{{$tag->id}}</td>
          <td>{{$tag->name}}</td>
          <td width="10px">

<a class="btn btn-primary btn-sm" href="{{route('tags.edit',$tag)}}">Editar</a>

          </td>

          <td width="10px">
<form  action="{{route('tags.destroy',$tag)}}" method="post">
@csrf
@method('delete')


<button class="btn btn-danger btn-sm" type="submit" >Eliminar</button>
</form>

          </td>

        </tr>

      @endforeach
      </tbody>
    </table>

  </div>

</div>
@stop
