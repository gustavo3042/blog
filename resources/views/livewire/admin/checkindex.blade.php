





  <div class="card">


  <div class="card-header">


      <a class="btn btn-primary mb-4   "href="{{route('check.create')}}"> <i class="fas fa-check"></i>FichaTecnica</a>


  





      <div class="card-header">


      
      
        <input wire:model="search" class="form-control" placeholder="Ingrese patente de un vehículo">
      
      </div>

  </div>

  @if ($checkl->count())

    <div class="card-body">

      @if (Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
          {{Session::get('Mensaje')}}
        </div>

      @endif

  <table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Encargado</th>
      <th>Patente</th>
     
      
    </tr>
  </thead>

  <tbody>
  @foreach ($checkl as $check )

  <tr>
    <td>{{$check->id}}</td>
    <td>{{$check->encargado}}</td>
   


   
    <td>{{$check->patente}}
      {!! Form::hidden('user_id',auth()->user()->id) !!}
    </td>
    <td><input type="hidden" value="{{$check->user_id}}"></td>

    <td width="10px">

  <a class="btn btn-primary btn-sm" href="{{route('check.edit',$check)}}">Editar</a>

    </td>

    <td width="10px"><a class="btn btn-success btn-sm" href="{{route('check.show',$check)}}">Show</a></td>

    <td width="10px">

 
 

  <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" >Eliminar</button>



    </td>


    <td width="10px">

      <a style="color:white; background: darkcyan;" class="btn-sm" href="{{route('check.presupuesto',$check)}}">Presupuesto</a>

    </td>

  

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
