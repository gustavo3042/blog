<div>
    <div>
        @if($isOpen)
            <div class="modal">
                <div class="modal-content">
                    <span wire:click="close" class="close">&times;</span>
                    <h2>Agregar Repuestos</h2>
                    @foreach($repuestos as $index => $repuesto)
                        <div class="form-group">
                            <input type="text" wire:model="repuestos.{{ $index }}.nombrerepuesto" placeholder="Nombre del repuesto">
                            <input type="number" wire:model="repuestos.{{ $index }}.preciorepuesto" placeholder="Precio del repuesto">
                            <input type="number" wire:model="repuestos.{{ $index }}.cantidadrepuesto" placeholder="Cantidad del repuesto">
                            <button type="button" wire:click="removeRepuesto({{ $index }})">Eliminar</button>
                        </div>
                    @endforeach
                    <button type="button" wire:click="addRepuesto">Agregar Repuesto</button>
                    <button type="button" wire:click="close">Cerrar</button>
                </div>
            </div>
        @endif
    </div>
</div>
