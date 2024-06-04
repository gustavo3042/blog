<div wire:ignore.self class="modal fade" id="borrarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

           

            

            <div class="modal-body">

               
               
            <h3>Seguro deseas eliminar este cliente?</h3>
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal(a)"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                    <button  type="button" wire:click.prevent="eliminar()" class="btn btn-primary" data-dismiss="modal">Borrar</button>
                </div>
               
            </div>
          
       </div>
    </div>
</div>