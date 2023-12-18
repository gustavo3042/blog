<div>
  @include('livewire.admin.clientes.modal.editCliente')


    <div class="card mt-4">

      @if (Session::has('Mensaje'))

      <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
      </div>
  
      @endif



    

      <div class="card-header">

        <div class="card-title">

            <h2 style="padding: 15px;">Clientes Taller</h2> 

         </div>

        </div>

        <div class="card-body">

           
            
            <a class="btn btn-info btn-sm mb-5" href="{{route('clientes.create')}}">Crear Cliente</a>
      
          <table class="table table-striped">
      
            <thead>
              <tr>
      
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>
      
              </tr>
            </thead>
      
            <tbody>
      
              @foreach ($clientes as $client)
      
      
              <tr>
                <td>{{$client->nombre}}</td>
                <td>{{$client->direccion}}</td>
                <td>{{$client->telefono}}</td>
                <td>{{$client->correo}}</td>
                <td>
      
              <div class="btn-group"  role="group">

               

                <button  data-toggle="modal" data-target="#editarCliente" wire:click="editar({{ $client->id }})" class="btn btn-info btn-sm">
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
  
      $('#editarCliente').modal('hide');

      
  });
</script> 