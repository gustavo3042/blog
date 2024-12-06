<div>
 
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Crear Cliente</div>
        </div>

        @if (Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>
    
        @endif



      
        <div class="card-body">

          
           
            <div class="form-group">

                <label for="nombre">Nombre Cliente</label>
                <input type="text" wire:model="nombre" class="form-control">

                @error('nombre')
                <span class="error text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" wire:model="direccion" class="form-control">
                @error('direccion')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" wire:model="telefono" class="form-control">
                @error('telefono')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" wire:model="correo" class="form-control">
                @error('correo')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">

                <button wire:click="crearCliente()" class="btn btn-primary btn-sm">Guardar</button>

            </div>
            
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>

</div>
