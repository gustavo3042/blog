
<div>
   
    <style>
        .image-wrapper{
      position: relative;
      padding-bottom: 56.25%;
    
        }
    
        .image-wrapper img{
    
      position: absolute;
      object-fit: cover;
      width: 100%;
      height: 100%;
        }
      </style>

    <div class="card mt-5">


      <div class="card-header">
  
        <div class="card-title">

            <h2 style="padding: 15px;">Crear Insumo</h2> 
            <a class="btn btn-primary btn-sm" href="{{route('insumos.index')}}">volver</a>

         </div>

       

        </div>


        <div class="card-body">

      
          

            <div class="card-body">


              <div class="container">

                <div class="row">
    
                  <div class="col">

                      <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" wire:model="name" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" wire:model="stock" class="form-control">
                    </div>
                    
                  </div>
    
    
                  <div class="col">

                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input type="number" wire:model="precio" class="form-control">
                  </div>
                    
                  </div>
                  
                </div>
    
              </div>

              <div class="form-group ">
                <label for="descripcion">Descripción</label>
               <textarea wire:model="descripcion" cols="20" rows="5" class="form-control"></textarea>
              </div>

<!-- sesion de imagen, se debe crear un grid y poner dentro de un row y tantos div como columnas quiera crear -->
    <div class="row mt-5">
    
        <div class="col-sm-6">
        
          <div class="image-wrapper">
        
        
            @isset($insumo->imageInsumo)
        
        <img id="picture" src="{{asset('storage').'/'.$insumo->imageInsumo->url}}"  alt="">
        
              @else
        
        <img id="picture" src="https://cdn.pixabay.com/photo/2015/11/10/14/26/box-1036976_1280.png" alt="">
        
            @endif
        
          </div>
        
        </div>
        
        
        <div class="col-sm-6">
        
          <div class="form-group">
        
            {!! Form::label('file','Imagen de la falla') !!}
          
            {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*','wire:model' => 'file']) !!}


        
            @error ('file')
        
              <span class="text-danger">{{$message}}</span>
        
            @enderror
        
          </div>
        
        
        
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
        </div>
        
        
        </div>

        </div>

        <a class="btn btn-primary btn-sm float-right" wire:click="update()">Editar Producto</a>

    </div>

</div>

@push('js')

  
  
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('registroEditado', () => {
            Swal.fire({
                title: 'Registro actualizado con éxito!',
                text: 'El producto quedo guardado en la lista de insumos del taller!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    });
</script>
    

<script>




    document.getElementById("file").addEventListener('change', cambiarImagen);
  
          function cambiarImagen(event){
              var file = event.target.files[0];
  
              var reader = new FileReader();
              reader.onload = (event) => {
                  document.getElementById("picture").setAttribute('src', event.target.result);
              };
  
              reader.readAsDataURL(file);
          }
  
  
  
    </script>

@endpush