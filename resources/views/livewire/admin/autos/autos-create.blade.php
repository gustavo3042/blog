<div>
 
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Crear Vehículo</div>
        </div>

        @if (Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>
    
        @endif



        @if (Session::has('Mensaje'))
        

        <div class="alert alert-danger" role="alert">
            {{Session::get('Mensaje2')}}
          </div>
        @endif
        <div class="card-body">

          
           
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

            

            <div class="btn-group" role="group" aria-label="Basic example">

                <button wire:click="crearAuto()" class="btn btn-primary btn-sm">Guardar</button>

            </div>
            
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>

</div>
