<div wire:ignore.self class="modal fade" id="editarAutos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del vehículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

           

            

            <div class="modal-body">

                <div class="form-group">

                    <label for="patente">Patente</label>
                    <input type="text" wire:model="patente" class="form-control">
    
                    @error('patente')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
              
               
                <div class="form-group">
    
                    <label for="marca">Marca</label>
                    <input type="text" wire:model="marca" class="form-control">
    
                    @error('marca')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" wire:model="modelo" class="form-control">
                    @error('modelo')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="ano">Año</label>
                    <input type="number" wire:model="ano" class="form-control">
                    @error('ano')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" wire:model="color" class="form-control">
                    @error('color')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <label for="tipoDireccion">Tipo de dirección</label>
                <div class="form-group mb-3">
    
                    
    
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" wire:model="tipoDireccion" type="radio" id="inlineCheckbox1"
                            value="Mecanica">
                        <label class="form-check-label" for="inlineCheckbox1">Mecanica</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model="tipoDireccion" type="radio" id="inlineCheckbox2"
                            value="Hidraulica">
                        <label class="form-check-label" for="inlineCheckbox2">Hidraulica</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model="tipoDireccion" type="radio" id="inlineCheckbox3"
                            value="Electrica">
                        <label class="form-check-label" for="inlineCheckbox3">Electrica</label>
                    </div>
                    @error('tipoDireccion')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
    
                <label for="tipoTraccion">Tipo de Tracción</label>
    
                <div class="form-group mb-3">
    
    
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" wire:model="tipoTraccion" type="radio" id="inlineCheckbox1"
                            value="2x4">
                        <label class="form-check-label" for="inlineCheckbox1">2x4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model="tipoTraccion" type="radio" id="inlineCheckbox2"
                            value="4x4">
                        <label class="form-check-label" for="inlineCheckbox2">4x4</label>
                    </div>
                    @error('tipoTraccion')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
    
                <label for="tipoTraccion">Tipo de Combustión</label>
    
                <div class="form-group mb-3">
    
    
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" wire:model="tipoCombustion" type="radio" id="inlineCheckbox1"
                            value="Gasolina">
                        <label class="form-check-label" for="inlineCheckbox1">Gasolina</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model="tipoCombustion" type="radio" id="inlineCheckbox2"
                            value="Diesel">
                        <label class="form-check-label" for="inlineCheckbox2">Diesel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model="tipoCombustion" type="radio" id="inlineCheckbox3"
                            value="Gas">
                        <label class="form-check-label" for="inlineCheckbox3">Gas</label>
                    </div>
                    @error('tipoCombustion')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
    
                </div>
    
                <div class="form-group">
                    <label for="cilindrada">Cilindrada</label>
                    <input type="text" wire:model="cilindrada" class="form-control">
                    @error('cilindrada')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
              {{--   <div class="form-group">
                    <label for="kilometraje">Kilometraje</label>
                    <input type="number" wire:model="kilometraje" id="" class="form-control" placeholder="" >
                   
                    @error('kilometraje')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
    
                
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal(a)"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                    <button  type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Editar</button>
                </div>
               
            </div>
          
       </div>
    </div>
</div>