


<div>


  <div class="card">


<div class="card-header">

<form class="form-inline my-2 my-lg-0 float-right ">

<input  type="search" name="buscar" class="form-control" value="" placeholder="Ingrese el nombre o correo de un usuario">
<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
</form>


</div>

@if ($users->count())


    <div class="card-body">


<table class="table table-striped">


  <thead>

    <tr>

      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th></th>

    </tr>
  </thead>


  <tbody>

  @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>


            <td width="10px">

<a class="btn btn-primary" href="{{route('users.edit',$user)}}">Editar</a>

            </td>
    </tr>

  @endforeach

  </tbody>



</table>



    </div>

    <div class="card-footer">


{{$users->links()}}
    </div>

  @else


    <div class="card-body">

<strong>No hay registros</strong>

    </div>

  @endif

  </div>

</div>
