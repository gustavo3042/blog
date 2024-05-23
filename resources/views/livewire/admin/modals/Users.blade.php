<div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

           

            

            <div class="modal-body">

                <div class="form-group">

                    <label for="name">Nombre usuario</label>
                    <input type="text" wire:model="name" class="form-control">
    
                    @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>


                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="email" wire:model="email" class="form-control">
    
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
              
    
                <div class="form-group">

                    <label for="password">Password</label>
                    <input type="text" wire:model="password" class="form-control">
    
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal()"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                     <button  type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
               
            </div>
          
       </div>
    </div>
</div>



<div wire:ignore.self class="modal fade" id="editarUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

           

            

            <div class="modal-body">

                <div class="form-group">

                    <label for="name">Nombre usuario</label>
                    <input type="text" wire:model="name" class="form-control">
    
                    @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>

                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="email" wire:model="email" class="form-control">
    
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
              
    
                <div class="form-group">

                    <label for="password">Password</label>
                    <input type="text" wire:model="password" class="form-control">
    
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
              
    
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal()"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                   <button  type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Editar</button> 
                </div>
               
            </div>
          
       </div>
    </div>
</div>