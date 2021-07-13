
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>




    @if (Session::has('Mensaje'))
      <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
      </div>
    @endif


    <div class="card">

      <div class="card-header">
    <a class="btn btn-secondary " href="{{route('categorias.create')}}">Agregar Categoria</a>
      </div>

      <div class="card-body">

    <table class="table table-striped">

      <thead>
        <tr>
          <th>ID</th>
            <th>Name</th>
              <th colspan="2"></th>
        </tr>

      </thead>

      <tbody>

        @foreach ($categories as $category)

    <tr>

      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>

      <td width="10px">

    <a class="btn btn-primary btn-sm" href="{{route('categorias.edit',$category->id)}}">Editar</a>

      </td>

      <td width="10px">

    <form class="" action="{{route('categorias.destroy',$category)}}" method="post">
      @csrf
      @method('delete')

    <button type="submit" class="btn btn-danger btn-sm" name="button">Eliminar</button>

    </form>

      </td>
    </tr>
        @endforeach

      </tbody>

    </table>

      </div>

    </div>
@stop
