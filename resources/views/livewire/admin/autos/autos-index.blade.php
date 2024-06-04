<div>
    @include('livewire.admin.autos.modal.editAutos')
    @include('livewire.admin.autos.modal.deleteAutos')
  
  
      <div class="card mt-4">
  
        @if (Session::has('Mensaje'))
  
        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>
    
        @endif
  
  
     
  
      
  
        <div class="card-header">
  
          <div class="card-title">
  
              <h2 style="padding: 15px;">Autos Taller</h2> 
  
           </div>

           <input wire:model="search" class="form-control" placeholder="Buscar">
  
          </div>

       

          @if($autos->count())
  
          <div class="card-body">
  
             
            <a class="btn btn-info btn-sm mb-5" href="{{route('autos.create')}}">Crear Vehículo</a>
          
        
            <table class="table table-striped">
        
              <thead>
                <tr>
                  <th>Patente</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Año</th>
                  <th>Color</th>
                  <th>Acciones</th>
        
                </tr>
              </thead>
        
              <tbody>
        
                @foreach ($autos as $car)
        
        
                <tr>
                  <td>{{$car->patente}}</td>
                  <td>{{$car->marca}}</td>
                  <td>{{$car->modelo}}</td>
                  <td>{{$car->ano}}</td>
                  <td>{{$car->color}}</td>
                  <td>
        
                <div class="btn-group"  role="group">
  
                 
  
                  <button  data-toggle="modal" data-target="#editarAutos" wire:click="editar({{ $car->id }})" class="btn btn-info btn-sm">
                    <i class="fas fa-pencil"></i>Editar</button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal"  data-target="#borrarAutos"  wire:click="captarId({{$car->id}})">Borrar</button>
  
                </div>
        
                  </td>
        
                </tr>
        
                  @endforeach
              </tbody>
        
            </table>
        
          </div>

          <div class="card-footer">


            {{$autos->links()}}
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
    
        $('#editarAutos').modal('hide');
        $('#borrarAutos').modal('hide');
        
    });
  </script> 