<div>
    @include('livewire.admin.autos.modal.editAutos')
  
  
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
  
          </div>
  
          <div class="card-body">
  
             
              
              <a class="btn btn-info btn-sm mb-5" href="{{route('autos.create')}}">Crear Vehículo</a>
        
            <table class="table table-striped">
        
              <thead>
                <tr>
        
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
                  <td>{{$car->marca}}</td>
                  <td>{{$car->modelo}}</td>
                  <td>{{$car->ano}}</td>
                  <td>{{$car->color}}</td>
                  <td>
        
                <div class="btn-group"  role="group">
  
                 
  
                  <button  data-toggle="modal" data-target="#editarAutos" wire:click="editar({{ $car->id }})" class="btn btn-info btn-sm">
                    <i class="fas fa-pencil"></i>Editar</button>
                  <button class="btn btn-danger btn-sm" type="submit" wire:click="">Borrar</button>
  
                </div>
        
                  </td>
        
                </tr>
        
                  @endforeach
              </tbody>
        
            </table>
        
          </div>
        
        </div>
  </div>
  
  <script type="text/javascript">
  
    window.livewire.on('userStore', () => {
    
        $('#editarAutos').modal('hide');
  
        
    });
  </script> 