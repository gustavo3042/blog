
<div class="card">




<div class="card-header">


  <a class="btn btn-secondary float-right mb-4 " href="{{route('orden.create')}}">Nueva orden</a>

  <input wire:model="search" class="form-control" placeholder="Ingrese patente de un vehículo">

</div>





@if ($ordenes->count())


  <div class="card-body">


    <table class="table table-striped">

      <thead>
        <tr>
          <th>id</th>
          <th>Encargado</th>
          <th>Fecha</th>
          <th>Patente</th>
          
        </tr>
      </thead>

      <tbody>

@foreach ($ordenes as $orden)

  <tr>
    <td>{{$orden->id}}</td>
    <td>{{$orden->encargado}}</td>
    <td>{{$orden->fecha}}</td>
    <td>{{$orden->patente}}</td>
    <td><input type="hidden" value="{{ auth()->user()->id }}"></td>
      <td><input type="hidden" value="{{ auth()->user()->name }}"></td>
    <td width="10px">

<a class="btn btn-primary btn-sm" href="{{route('orden.edit',$orden)}}">Editar</a>


    </td>

    <td witdh="10px">

{!! Form::open(['route'=>['orden.destroy',$orden],'method'=>'DELETE']) !!}


{!! Form::submit('Borrar',['class'=>'btn btn-danger btn-sm']) !!}

{!! Form::close() !!}

    </td>
  </tr>

@endforeach

      </tbody>

    </table>

  </div>

  <div class="card-footer">
    {{$ordenes->links()}}
  </div>

  @else

    <div class="card-body">



    <div class="alert alert-danger">
        <strong>No existe el registro</strong>
    </div>


</div>


  @endif

</div>
