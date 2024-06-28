



<div>

<div class="card mt-5">


  <div class="card-header">

    <div class="card-title">

        <h2 >Crear Venta</h2> 
        <a class="btn btn-primary btn-sm" href="{{route('ventas.index')}}">volver</a>

     </div>

   
     
    </div>


    <div class="card-body">

  
      

        <div class="card-body">


          <div class="container">

            <div class="row">

              <div class="col">

                  <div class="form-group">
                  <label for="name">Nombre Producto</label>
                  <input type="text" wire:model="name" class="form-control " readonly>
                  </div>

                  <div class="form-group">
                    <label for="venta">Cantidad</label>
                    <input type="number" wire:model="venta" class="form-control ">
                </div>

          
           

                  

                
               
                
              </div>

              <div class="col">
           

              <div class="form-group">
                <label for="precioVenta">Precio de Venta</label>
                <input type="number" wire:model="precioVenta" class="form-control">
            </div>

            <div class="form-group">
              <label for="stock">Stock Actual</label>
              <input type="number" wire:model="stock" class="form-control" readonly>
          </div>


          </div>

              </div>

            

            <div class="form-group ">
              <label for="descripcion">Descripción del Producto</label>
             <textarea wire:model="descripcion" cols="20" rows="5" class="form-control" readonly></textarea>
            </div>

          </div>

       

        </div>

        <a class="btn btn-primary btn-sm float-right" wire:click="storeVenta()">Generar Venta</a>

    </div>

   

</div>

</div>

@push('js')



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('livewire:load', function () {
    Livewire.on('registroCreado', () => {
        Swal.fire({
            title: 'Venta creada con éxito!',
            text: 'El producto fue vendido correctamente!',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
});
</script>









@endpush 