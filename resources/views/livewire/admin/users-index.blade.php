<div>
@include('livewire.admin.modals.Users')

  <div class="card">


<div class="card-header">

  @if (Session::has('Mensaje'))
  <div class="alert alert-success">
<strong>{{Session::get('Mensaje')}}</strong>
  </div>
 @endif

{{-- <form class="form-inline my-2 my-lg-0 float-right ">

<input  type="search" name="buscar" class="form-control" value="" placeholder="Ingrese el nombre o correo de un usuario">
<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
</form> --}}

<input wire:model="search" class="form-control" placeholder="Buscar">

</div>

@if ($users->count())


    <div class="card-body">

   

      <button  data-toggle="modal" data-target="#createUser" class="btn btn-info btn-sm mb-5">
        <i class="fas fa-pencil"></i>Crear Usuario</button>

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


            <td>
              <div class="btn-group">

                <a class="btn btn-primary btn-sm" href="{{route('users.edit',$user)}}">Asignar Rol</a>
                <button  data-toggle="modal" data-target="#editarUser" wire:click="editar({{ $user->id }})" class="btn btn-info btn-sm">
                  <i class="fas fa-pencil"></i>Editar</button>

                <button class="btn btn-danger btn-sm" wire:click="delete('{{$user->id}}')">Eliminar</button>

              </div>
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
<script type="text/javascript">

  window.livewire.on('userStore', () => {
  
      $('#editarUser').modal('hide');
      $('#createUser').modal('hide');

      
  });
</script> 