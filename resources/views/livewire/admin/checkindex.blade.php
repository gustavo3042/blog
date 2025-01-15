  
{{-- @include('livewire.admin.modals.imageModal') --}}
  
  <div class="card mt-4">

    @if (Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">
      {{Session::get('Mensaje')}}
    </div>

  @endif

  <div class="card-header">

    <div class="card-title">

      <h2 style="padding: 15px;">Orden de Trabajo</h2> 

   </div>


    <input wire:model="search" class="form-control" placeholder="Ingrese patente de un vehículo">
    <a class="btn btn-info btn-sm mt-3 mb-5"href="{{route('check.create')}}"> <i class="fas fa-check"></i>Crear Orden</a>

  </div>


  @if ($checkl->count())

    <div class="card-body">



  <table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
    
      <th>Encargado</th>
      <th>Patente</th>
      <th>Fecha de ingreso</th>
      <th>Fecha de termino</th>
      <th>Imagen</th>
     
      
    </tr>
  </thead>

  <tbody>
  @foreach ($checkl as $check )

  <tr>
    <td>{{$check->id}}</td>
    <td>{{$check->encargado}}</td>
   

    <td>{{$check->patente}}</td>
    <td>{{$check->fecha}}</td>
    <td>{{$check->fechaTermino}}</td>

    <td>
      <div style="cursor: pointer; width: 200px; height: 200px; overflow: hidden;">
      @if ($check->images->isNotEmpty())
      @foreach ($check->images as $image)
      {{-- Tambien se puede enviar una ruta con wire:click utilizando una etiqueta img como boton --}}
      <img src="{{ asset('storage/' . $image->url) }}" alt="Imagen asociada" class="img-fluid rounded img-thumbnail"  wire:click="showImage('{{ asset('storage/' . $image->url) }}')">
      @endforeach
      @else
      <span>Sin imágenes</span>
      @endif
      </div> 

    

   
    </td>
    <td>
    <div class="btn-group"  role="group">
     
      {!! Form::hidden('user_id',auth()->user()->id) !!}
    
    <input type="hidden" value="{{$check->user_id}}">



  <a class="btn btn-primary btn-sm" href="{{route('check.edit',$check)}}">Editar</a>

  

   <a class="btn btn-success btn-sm" href="{{route('check.show',$check)}}">Show</a>


  <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" >Eliminar</button>


      <a  class="btn btn-primary btn-sm " href="{{route('check.pdf',$check->id)}}" >PDF</a>
    
    
  
    </div>

  </td>


  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Vista ampliada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                @if ($selectedImage)
                    <img src="{{ $selectedImage }}" alt="Imagen ampliada" class="img-fluid">
                @endif
            </div>
        </div>
    </div>
</div>
</div>
  
 

  

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deceas eliminar este registro?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="" action="{{route('check.destroy',$check)}}" method="post">
              @csrf
              @method('DELETE')
          
          <h3>Vehículo patente {{$check->patente}} </h3> 

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger "  name="button">Eliminar</button>
            </div>
          
            </form>
           
          
          </div>
        
        </div>
      </div>
    </div>
  </tr>
  @endforeach
  </tbody>
  </table>
    </div>

    <div class="card-footer">
      {{$checkl->links()}}
    </div>


    @else

    <div class="card-body">



    <div class="alert alert-danger">
        <strong>No existe el registro</strong>
    </div>


</div>


  @endif

  </div>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('show-image-modal', event => {
            $('#imageModal').modal('show');
        });
    });
</script>

  

  {{--

   <script>
    window.addEventListener('close-modal', event => {
        $('#imageModal').modal('hide');
    })
  </script> 

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que disparó el modal
        var imageUrl = button.data('image'); // Obtén la URL de la imagen
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl; // Asigna la URL de la imagen al src del modal
      });
    });
  </script> 
--}}


