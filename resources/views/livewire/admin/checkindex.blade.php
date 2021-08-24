





  <div class="card">


  <div class="card-header">


      <a class="btn btn-secondary   "href="{{route('check.create')}}">Nuevo CheckList</a>





    <form class="form-inline my-2 my-lg-0 float-right ">

    <input  type="search" name="buscar" class="form-control" value="" placeholder="Ingrese Patente del vehiculo">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>


  </div>


    <div class="card-body">

      @if (Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>

      @endif

  <table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Encargado</th>
      <th>Patente</th>
      <th colspan="2"></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($checkl as $check )

  <tr>
    <td>{{$check->id}}</td>
    <td>{{$check->encargado}}</td>
    <td>

{!! Form::hidden('user_id',auth()->user()->id) !!}
    </td>
    <td>{{$check->patente}}</td>
    <td><input type="hidden" value="{{$check->user_id}}"></td>

    <td width="10px">

  <a class="btn btn-primary btn-sm" href="{{route('check.edit',$check)}}">Editar</a>

    </td>

    <td width="10px">

  <form class="" action="{{route('check.destroy',$check)}}" method="post">
    @csrf
    @method('DELETE')

  <button onClick="return confirm('¿Seguro quiere borrar este registro?');" class="btn btn-danger btn-sm" type="submit" name="button">Eliminar</button>

  </form>

    </td>
  </tr>
  @endforeach
  </tbody>
  </table>
    </div>

    <div class="card-footer">
      {{$checkl->links()}}
    </div>

  </div>
