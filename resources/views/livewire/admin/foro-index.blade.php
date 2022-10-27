





  <div class="card">


    <div class="card-header">
  
  
        <a class="btn btn-primary mb-4   "href="{{route('check.create')}}"> <i class="fas fa-check"></i>FichaTecnica</a>
  
  
    
  
  
  
  
  
        <div class="card-header">
  
  
        
        
         <form action="{{route('foro.index')}}" method="GET">

            <input width="30%" type="text" name="buscar" class="form-control" placeholder="Ingrese Datos">
            <button class="btn-primary" type="submit">Buscar</button>

         </form>
        
        </div>
  
    </div>
  
    @if ($checkl->count())
  
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
       
        
      </tr>
    </thead>
  
    <tbody>
    @foreach ($checkl as $check )
  
    <tr>
      <td>{{$check->id}}</td>
      <td>{{$check->encargado}}</td>
     
  
  
     
      <td>{{$check->patente}}
     
      </td>
      
  
  
  
      </td>
  
  
     
  
    
  
     
    </tr>
    @endforeach
    </tbody>
    </table>
      </div>
  
      <div class="card-footer">
       
      </div>
  
  
      @else
  
      <div class="card-body">
  
  
  
      <div class="alert alert-danger">
          <strong>No existe el registro</strong>
      </div>
  
  
  </div>
  
  
    @endif
  
    </div>
  
