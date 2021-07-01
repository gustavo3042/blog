

@extends('layouts.tags')
@section('contenido')


<div class="card">

<div class="card-body">



<table class="table table-striped">
  <thead>
    <tr>
    <th>Nombre Post</th>
  <th>Nombre Categoria</th>
  <th>Nombre Usuario</th>
    </tr>
  </thead >


  <tbody>
    @foreach ($listar as $fila)


    <tr>
        <td>{{$fila->alias}}</td>
    <td>{{$fila->nombre}}</td>
      <td>{{$fila->user}}</td>


    </tr>
      @endforeach
  </tbody>

</table>



</div>
</div>

@endsection
