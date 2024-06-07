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
  
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($insumos as $product)
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                            <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                            <p class="text-gray-600 mb-2">{{ $product->descripcion }}</p>
                            <span class="text-green-500 font-bold">${{ $product->stock }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
         
        
        </div>
  </div>
  
  <script type="text/javascript">
  
    window.livewire.on('userStore', () => {
    
        $('#editarInsumos').modal('hide');
        $('#borrarInsumos').modal('hide');
  
        
    });
  </script> 
