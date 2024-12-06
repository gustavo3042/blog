<div>
  


<div class="card">


    <div class="card-header">
    
        <h2 style="font-weight: bold;" class="text-center pt-5 mb-4">Mis Posts Foro Consultas </h2>
    
        <a class="btn btn-primary btn-sm mb-4" href="{{route('foro.index')}}">Volver</a>
    
    
        <input wire:model="search" type="date" class="form-control" placeholder="Ingrese patente de un vehículo">
    
    
    
   
    
    
    </div>
    
    
      <div class="card-body">
    
        @if (Session::has('Mensaje'))
    
          <div class="alert alert-success" role="alert">
            {{Session::get('Mensaje')}}
          </div>
    
        @endif

        @if ($postsForo->count())
    
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    
    <tbody>
    @foreach ($postsForo as $post )
    
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->nombre}}</td>
      <td><input type="hidden" value="{{$post->user_id}}"></td>
    

    
  
    
  
    
      <td width="10px">

        <div  class="btn-group" role="group" aria-label="Basic example">

    <a class="btn btn-primary btn-sm" href="{{route('foroPosts.edit',$post->id)}}">Editar</a>
    
    <form class="" action="{{route('foroPosts.destroy',$post->id)}}" method="post">
      @csrf
      @method('DELETE')
    
    <button onclick=" return confirm('¿Seguro desea borrar este registro?');" class="btn btn-danger btn-sm" type="submit">Eliminar</button>
    
    </form>

        </div>
    
      </td>
    </tr>
    @endforeach
    </tbody>
    </table>
      </div>
    
      <div class="card-footer">
        {{$postsForo->links()}}
      </div>
    
    </div>


    @else

    <div class="card-body">



    <div class="alert alert-danger">
        <strong>No existe el registro</strong>
    </div>


</div>


  @endif
    
</div>
