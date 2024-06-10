<div>
    
<div class="card">
    
    <div class="card-header">
    
      @if (Session::has('Mensaje'))
      <div class="alert alert-success">
    <strong>{{Session::get('Mensaje')}}</strong>
      </div>
     @endif

     <div class="card-title">

        <h2 style="padding: 15px;">Categoria Reparaciones y Servicios</h2> 

     </div>
    <input wire:model="search" class="form-control" placeholder="Buscar">
    
    </div>
    
    @if ($reparaciones->count())
    
    
        <div class="card-body">
    
       
    
          <a  type="submit" href="{{route('reparaciones.create')}}" class="btn btn-info btn-sm mb-5">
            <i class="fas fa-pencil"></i>Crear Reparación</a>
    
    <table class="table table-striped">
    
    
      <thead>
    
        <tr>
    
          <th>ID</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th></th>
    
        </tr>
      </thead>
    
    
      <tbody>
    
      @foreach ($reparaciones as $reparacione)
        <tr>
          <td>{{$reparacione->id}}</td>
            <td>{{$reparacione->name}}</td>
              <td>{{$reparacione->Precio}}</td>
    
    
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
    
  
                        <a class="btn btn-info btn-sm" href="{{route('reparaciones.edit',$reparacione)}}">Editar</a>
                        
                        
                          
                        
                        {!! Form::open(['route'=>['reparaciones.destroy',$reparacione],'method'=>'DELETE']) !!}
                        
                        
                        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger btn-sm']) !!}
                        
                        {!! Form::close() !!}
                        
                        
                        
                          </div>
                </td>
        </tr>
    
      @endforeach
    
      </tbody>
    
    
    
    </table>
    
    
    
        </div>
    
        <div class="card-footer">
    
    
    {{$reparaciones->links()}}
        </div>
    
      @else
    
    
        <div class="card-body">
    
    <strong>No hay registros</strong>
    
        </div>
    
      @endif
    
      </div>
    
    </div>
  