
@extends('layouts.plantilla')
@section('contenido')


<div class="center">


<table>
  <thead>
    <tr>
    <th>Nombre categoria</th>
  <th>Nombre Usuario</th>
    </tr>
  </thead >



    @foreach ($listar as $fila)

  <tbody>
    <tr>
        <!--<td>{{$fila->alias}}</td> -->
  <!--    <td>{{$fila->nombre}}</td> -->
    <!--  <td>{{$fila->name}}</td> -->

    </tr>
      @endforeach
  </tbody>

</table>
</div>
{{$listar->links()}}

@endsection
