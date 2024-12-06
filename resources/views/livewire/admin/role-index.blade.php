
<div>


    <div class="card">
  
  
  <div class="card-header">


    <a class="btn btn-info btn-sm mb-4" href="{{route('roles.create')}}">Crear nuevo Rol</a>
  
  {{-- <form class="form-inline my-2 my-lg-0 float-right ">
  
  <input  type="search" name="buscar" class="form-control" value="" placeholder="Ingrese el nombre o correo de un usuario">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form> --}}

  @if (Session::has('Mensaje'))
  <div class="alert alert-success">
<strong>{{Session::get('Mensaje')}}</strong>
  </div>
 @endif
  
  <input wire:model="search" class="form-control" placeholder="Buscar">
  
  </div>
  
  @if ($roles->count())
  
  
      <div class="card-body">
  
  
  <table class="table table-striped">
  
  
    <thead>
  
      <tr>
  
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Acciones</th>
       
  
      </tr>
    </thead>
  
  
    <tbody>
  
    @foreach ($roles as $item)
      <tr>
        <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->created_at}}</td>
           
  
  
              <td width="10px">
                <div class="btn-group" role="group">

                   

                        <a class="btn btn-info btn-sm" href="{{route('roles.edit',$item)}}">Editar</a>
                        {!! Form::open(['route'=>['roles.destroy',$item],'method'=>'DELETE']) !!}
                        {!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        
                                     

                </div>
              </td>
      </tr>
  
    @endforeach
  
    </tbody>
  
  
  
  </table>
  
  
  
      </div>
  
      <div class="card-footer">
  
  
  {{$roles->links()}}
      </div>
  
    @else
  
  
      <div class="card-body">
  
  <strong>No hay registros</strong>
  
      </div>
  
    @endif
  
    </div>
  
  </div>
  