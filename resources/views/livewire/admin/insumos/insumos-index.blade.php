<div>

  
  
      <div class="card mt-4">
  
        @if (Session::has('Mensaje'))
  
        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>
    
        @endif
  
  
        <div class="card-header">
  
          <div class="card-title">
  

            @if(auth()->user()->hasRole('Admin') )
            <h2 style="padding: 15px;">Insumos Taller</h2> 

            @else

            <h2 style="padding: 15px;">Productos</h2> 
            @endif

          

           
  
           </div>
  
           <input wire:model="search" class="form-control" placeholder="Buscar">

           @if(auth()->user()->hasRole('Admin') )
           <a class="btn btn-info btn-sm mt-3 mb-5" href="{{route('insumos.create')}}">Crear Insumo</a>
           @endif
          </div>
  
          <div class="card-body">


          
          <div class="container">
            <div class="row">
                @foreach($insumos as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" style="height: 100%;">

                            @if ($product->imageInsumo)

                            <img src="{{asset('storage').'/'.$product->imageInsumo->url}}" class="card-img-top" alt="{{ $product->name }}">
                            
                            @else

                            <img id="picture" src="https://cdn.pixabay.com/photo/2014/06/04/16/36/man-362150_1280.jpg" alt="">
                            
                            @endif
                         
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->descripcion }}</p>
                                <p class="card-text">Stock : {{ $product->stock }}</p>
                                <p class="card-text"><strong>${{ $product->precio }}</strong></p>
                                <div class="mt-auto">
                                    @if(auth()->user()->hasRole('Admin') )
                                    <div class="btn-group">
                                    <a type="submit" href="{{route('insumos.edit',$product->id)}}" class="btn btn-primary btn-sm">Editar</a>
                                    <a wire:click="$emit('deleteInsumo',{{$product->id}})" class="btn btn-danger btn-sm">Borrar</a>
                                   
                                  </div>
                                  @endif
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
  
 
