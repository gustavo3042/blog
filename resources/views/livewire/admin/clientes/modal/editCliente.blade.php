<div wire:ignore.self class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

           

            

            <div class="modal-body">

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
    
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal()"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                    <button  type="button" wire:click.prevent="actualizarCliente('{{$cliente_id}}')" class="btn btn-primary" data-dismiss="modal">Editar</button>
                </div>
               
            </div>
          
       </div>
    </div>
</div>