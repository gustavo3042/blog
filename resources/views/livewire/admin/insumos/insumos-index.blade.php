<div>

  
  
      <div class="card mt-4">
  
        @if (Session::has('Mensaje'))
  
        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>
    
        @endif
  
  
        <div class="card-header">
  
          <div class="card-title">
  
              <h2 style="padding: 15px;">Insumos Taller</h2> 

           
  
           </div>
  
           <input wire:model="search" class="form-control" placeholder="Buscar">
           <a class="btn btn-info btn-sm mt-3 mb-5" href="{{route('insumos.create')}}">Crear Insumo</a>
  
          </div>
  
          <div class="card-body">

          {{--   <div class="container">
              <div class="row">
                  @foreach($insumos as $product)
                      <div class="col-md-4">
                          <div class="card mb-4">
                              <img src="{{asset('storage').'/'.$product->imageInsumo->url}}" class="card-img-top" alt="{{ $product->name }}">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $product->name }}</h5>
                                  <p class="card-text">{{ $product->descripcion }}</p>
                                  <p class="card-text">Stock Actual :{{ $product->stock }}</p>
                                  <p class="card-text">Status :{{ $product->status }}</p>
                                  <p class="card-text"><strong>${{ $product->precio }}</strong></p>
                                 
                                  <a href="#" class="btn btn-primary">Comprar</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div> --}}

          
          <div class="container">
            <div class="row">
                @foreach($insumos as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" style="height: 100%;">
                            <img src="{{asset('storage').'/'.$product->imageInsumo->url}}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->descripcion }}</p>
                                <p class="card-text">Stock : {{ $product->stock }}</p>
                                <p class="card-text"><strong>${{ $product->precio }}</strong></p>
                                <div class="mt-auto">
                                    <div class="btn-group">
                                    <a type="submit" href="{{route('insumos.edit',$product->id)}}" class="btn btn-primary btn-sm">Editar Producto</a>
                                    <a wire:click="$emit('deleteInsumo',{{$product->id}})" class="btn btn-danger btn-sm">Borrar Producto</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        </div>
  </div>

  @push('js')

{{--   <script type="text/javascript">
  
    window.livewire.on('userStore', () => {
    
        $('#editarInsumos').modal('hide');
        $('#borrarInsumos').modal('hide');  
    });
  </script>  --}}

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

  /*   Livewire.on('deletePost',postId => {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {

                console.log(postId)
                Livewire.emitTo('insumos-index','delete',postId)

                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
            }
            });


    }) */


    document.addEventListener('DOMContentLoaded', function () {
        @this.on('deleteInsumo', insumoId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', insumoId);
                    Swal.fire({
                title: "Producto eliminado!",
                text: "Insumo borrado con éxito.",
                icon: "success"
                });
                    
                }
            })
        });
    });




  </script>


 
      
  @endpush
  
 
